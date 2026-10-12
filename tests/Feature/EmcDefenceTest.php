<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\Message;
use App\Models\Page;
use App\Models\Product;
use App\Models\Reference;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmcDefenceTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_loads_and_displays_categories(): void
    {
        $cat = Category::create([
            'name' => 'MARX GENERATOR',
            'slug' => 'marx-generator',
            'icon' => 'bi-lightning-charge',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => $cat->id,
            'name' => 'Marx Generator RS105',
            'model_number' => 'MG-RS105',
            'short_description' => 'Fast rise-time pulse generator',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('MARX GENERATOR');
        $response->assertSee('Marx Generator RS105');
    }

    public function test_references_page_loads(): void
    {
        Reference::create([
            'name' => 'TÜBİTAK UME',
            'group' => 'shielded_rooms',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $response = $this->get('/references');
        $response->assertStatus(200);
        $response->assertSee('TÜBİTAK UME');
    }

    public function test_certificates_page_loads(): void
    {
        Certificate::create([
            'title' => 'ISO 9001:2015',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $response = $this->get('/certificates');
        $response->assertStatus(200);
        $response->assertSee('ISO 9001:2015');
    }

    public function test_product_detail_page_loads(): void
    {
        $cat = Category::create([
            'name' => 'Filters',
            'slug' => 'filters',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $product = Product::create([
            'category_id' => $cat->id,
            'name' => 'Power Line Filter TGH-16',
            'model_number' => 'TGH-16',
            'short_description' => '16A Filter',
            'description' => 'High reliability TEMPEST power filter',
            'specifications' => ['Attenuation' => '> 100 dB'],
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $response = $this->get('/product/'.$product->id);
        $response->assertStatus(200);
        $response->assertSee('Power Line Filter TGH-16');
        $response->assertSee('TGH-16');
        $response->assertSee('Attenuation');
    }

    public function test_contact_page_renders_corporate_details_and_form(): void
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertSee('İletişim & Laboratuvar Koordinasyonu');
        $response->assertSee('Deney Talep Formuna Git');
        $response->assertSee('Doğrudan İletişim & Danışma');
    }

    public function test_general_contact_form_submits_and_stores_message(): void
    {
        $response = $this->post('/contact', [
            'name' => 'Ahmet Yılmaz',
            'company' => 'Savunma Sanayii A.Ş.',
            'email' => 'ahmet@savunma.gov.tr',
            'phone' => '05321112233',
            'subject' => 'Teknik Danışma',
            'message' => 'Kartepe tesisinizde yankısız oda randevusu almak istiyoruz.',
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('messages', [
            'email' => 'ahmet@savunma.gov.tr',
            'subject' => 'Teknik Danışma',
            'message' => 'Kartepe tesisinizde yankısız oda randevusu almak istiyoruz.',
        ]);
    }

    public function test_test_request_page_renders_with_dynamic_daily_date(): void
    {
        $response = $this->get('/deney-talep-formu');
        $response->assertStatus(200);
        $response->assertSee('Deney Talep Formu');
        $response->assertSee('FR 7.1.4');
        $response->assertSee(now()->format('d.m.Y'));
    }

    public function test_test_request_form_submits_and_stores_official_device_data(): void
    {
        $response = $this->post('/deney-talep-formu', [
            'device_name' => 'RF Güç Amplifikatörü',
            'brand_model' => 'EMC-AMP-500',
            'voltage' => '220',
            'current' => '5',
            'product_standard' => 'EN 55032',
            'usage_area' => 'ENDÜSTRİYEL',
            'operation_mode' => 'Sürekli',
            'electronic_circuit' => 'Güç Elektroniği',
            'power_type' => 'AC',
            'connectors' => 'N-Tipi, SMA',
            'dimensions' => '400 x 300 x 150 mm',
            'device_description' => '500W laboratuvar tipi RF güç amplifikatörü emisyon ve bağışıklık testi.',
            'name' => 'Ali Veli',
            'company' => 'Defense Corp',
            'email' => 'ali@defensecorp.com',
            'phone' => '05551234567',
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('messages', [
            'email' => 'ali@defensecorp.com',
            'device_name' => 'RF Güç Amplifikatörü',
            'brand_model' => 'EMC-AMP-500',
        ]);
    }

    public function test_admin_guest_can_see_login_form(): void
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
        $response->assertSee('Control Panel');
    }

    public function test_admin_login_and_access_dashboard(): void
    {
        $admin = Admin::create([
            'name' => 'Admin Test',
            'email' => 'admin@test.com',
            'password' => 'secret123',
        ]);

        $loginResponse = $this->post('/admin/login', [
            'email' => 'admin@test.com',
            'password' => 'secret123',
        ]);

        $loginResponse->assertRedirect(route('admin.dashboard'));

        $dashboardResponse = $this->actingAs($admin, 'admin')->get('/admin/dashboard');
        $dashboardResponse->assertStatus(200);
        $dashboardResponse->assertSee('Dashboard Overview');
    }

    public function test_admin_can_manage_categories(): void
    {
        $admin = Admin::create([
            'name' => 'Admin Test',
            'email' => 'admin2@test.com',
            'password' => 'secret123',
        ]);

        $response = $this->actingAs($admin, 'admin')->post('/admin/categories', [
            'name' => 'Shielded Tents',
            'icon' => 'bi-tent',
            'sort_order' => 10,
            'is_active' => true,
        ]);

        $response->assertRedirect(route('admin.categories.index'));
        $this->assertDatabaseHas('categories', [
            'name' => 'Shielded Tents',
            'slug' => 'shielded-tents',
        ]);
    }

    public function test_admin_can_manage_products(): void
    {
        $admin = Admin::create([
            'name' => 'Admin Test',
            'email' => 'admin3@test.com',
            'password' => 'secret123',
        ]);

        $cat = Category::create([
            'name' => 'Test Cat',
            'slug' => 'test-cat',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin, 'admin')->post('/admin/products', [
            'category_id' => $cat->id,
            'name' => 'Test Antenna',
            'model_number' => 'ANT-01',
            'short_description' => 'Test antenna short',
            'specifications' => "Frequency: 10MHz\nGain: 12dBi",
            'is_active' => true,
            'sort_order' => 1,
        ]);

        $response->assertRedirect(route('admin.products.index'));
        $this->assertDatabaseHas('products', [
            'name' => 'Test Antenna',
            'model_number' => 'ANT-01',
        ]);
    }

    public function test_all_admin_views_render_without_errors(): void
    {
        $admin = Admin::create([
            'name' => 'Admin Test',
            'email' => 'admin4@test.com',
            'password' => 'secret123',
        ]);

        $this->actingAs($admin, 'admin');

        // Products
        $cat = Category::create(['name' => 'Cat 1', 'slug' => 'cat-1']);
        $prod = Product::create(['category_id' => $cat->id, 'name' => 'Prod 1']);
        $this->get(route('admin.products.index'))->assertStatus(200);
        $this->get(route('admin.products.create'))->assertStatus(200);
        $this->get(route('admin.products.edit', $prod->id))->assertStatus(200);

        // Categories
        $this->get(route('admin.categories.index'))->assertStatus(200);
        $this->get(route('admin.categories.create'))->assertStatus(200);
        $this->get(route('admin.categories.edit', $cat->id))->assertStatus(200);

        // References
        $ref = Reference::create(['name' => 'Ref 1', 'group' => 'shielded_rooms']);
        $this->get(route('admin.references.index'))->assertStatus(200);
        $this->get(route('admin.references.create'))->assertStatus(200);
        $this->get(route('admin.references.edit', $ref->id))->assertStatus(200);

        // Certificates
        $cert = Certificate::create(['title' => 'Cert 1', 'image_path' => 'certificates/iso_9001.svg']);
        $this->get(route('admin.certificates.index'))->assertStatus(200);
        $this->get(route('admin.certificates.create'))->assertStatus(200);
        $this->get(route('admin.certificates.edit', $cert->id))->assertStatus(200);

        // Messages & Test Requests
        $msg = Message::create(['name' => 'User 1', 'email' => 'u1@test.com', 'message' => 'Hello test message here']);
        $testReqMsg = Message::create([
            'name' => 'Savunma Yetkilisi',
            'email' => 'tech@def.gov.tr',
            'message' => 'Resmi test başvurusu teknik parametreleri iletildi.',
            'device_name' => 'EMC Test Cihazı Modül-X',
            'brand_model' => 'T-800',
            'voltage' => '220V AC',
            'current' => '10A',
            'product_standard' => 'MIL-STD-461G',
        ]);
        $this->get(route('admin.messages.index'))->assertStatus(200);
        $this->get(route('admin.messages.index', ['type' => 'test_request']))->assertStatus(200);
        $this->get(route('admin.messages.index', ['type' => 'contact']))->assertStatus(200);
        $this->get(route('admin.messages.show', $msg->id))->assertStatus(200);
        $this->get(route('admin.messages.show', $testReqMsg->id))->assertStatus(200)->assertSee('EMC Test Cihazı Modül-X');

        // Settings
        $this->get(route('admin.settings.index'))->assertStatus(200);
    }

    public function test_admin_can_update_all_dynamic_site_settings(): void
    {
        $admin = Admin::create([
            'name' => 'Admin Settings Test',
            'email' => 'settingstest@test.com',
            'password' => 'secret123',
        ]);

        $this->actingAs($admin, 'admin');

        $response = $this->post(route('admin.settings.update'), [
            'active_tab' => 'tab-hero',
            'hero_title_line1_tr' => 'Yeni Özel Savunma Sistemleri',
            'catalog_title_tr' => 'Özel Askeri Donanımlar',
            'test_form_doc_no' => 'FR 7.1.4-REV2',
            'contact_phone' => '+90 262 999 88 77',
        ]);

        $response->assertRedirect(route('admin.settings.index').'#tab-hero');
        $this->assertEquals('Yeni Özel Savunma Sistemleri', Setting::get('hero_title_line1_tr'));
        $this->assertEquals('Özel Askeri Donanımlar', Setting::get('catalog_title_tr'));
        $this->assertEquals('FR 7.1.4-REV2', Setting::get('test_form_doc_no'));
        $this->assertEquals('+90 262 999 88 77', Setting::get('contact_phone'));
    }

    public function test_language_switch_between_turkish_and_english(): void
    {
        // Switch to English
        $response = $this->get('/lang/en');
        $response->assertRedirect();
        $this->assertEquals('en', session('locale'));

        // Visit Home with English session
        $homeResponse = $this->withSession(['locale' => 'en'])->get('/');
        $homeResponse->assertStatus(200);
        $homeResponse->assertSee('Advanced');
        $homeResponse->assertSee('Electromagnetic Warfare');

        // Switch to Turkish
        $responseTr = $this->get('/lang/tr');
        $responseTr->assertRedirect();
        $this->assertEquals('tr', session('locale'));

        // Visit Home with Turkish session
        $homeTrResponse = $this->withSession(['locale' => 'tr'])->get('/');
        $homeTrResponse->assertStatus(200);
        $homeTrResponse->assertSee('Kritik Savunma Sistemleri');
    }

    public function test_admin_can_create_update_and_delete_pages(): void
    {
        $admin = Admin::create([
            'name' => 'Admin Page Manager',
            'email' => 'pagemgr@test.com',
            'password' => 'secret123',
        ]);

        $this->actingAs($admin, 'admin');

        // Create page with only title_tr (title_en is optional and should auto-fill)
        $storeResponse = $this->post(route('admin.pages.store'), [
            'title_tr' => 'Ar-Ge Laboratuvarı',
            'is_active' => '1',
            'show_in_navbar' => '1',
        ]);

        $storeResponse->assertRedirect(route('admin.pages.index'));
        $this->assertDatabaseHas('pages', [
            'title_tr' => 'Ar-Ge Laboratuvarı',
            'title_en' => 'Ar-Ge Laboratuvarı',
            'slug' => 'ar-ge-laboratuvari',
            'is_active' => true,
            'show_in_navbar' => true,
        ]);

        $page = Page::where('slug', 'ar-ge-laboratuvari')->first();
        $this->assertNotNull($page);

        // Update page and deactivate
        $updateResponse = $this->put(route('admin.pages.update', $page->id), [
            'title_tr' => 'Ar-Ge ve İnovasyon',
            'title_en' => 'R&D and Innovation',
            'slug' => 'ar-ge-inovasyon',
            // is_active omitted (unchecked)
        ]);

        $updateResponse->assertRedirect(route('admin.pages.index'));
        $page->refresh();
        $this->assertEquals('Ar-Ge ve İnovasyon', $page->title_tr);
        $this->assertEquals('R&D and Innovation', $page->title_en);
        $this->assertFalse($page->is_active);

        // Admin can delete page
        $deleteResponse = $this->delete(route('admin.pages.destroy', $page->id));
        $deleteResponse->assertRedirect(route('admin.pages.index'));
        $this->assertDatabaseMissing('pages', ['id' => $page->id]);
    }

    public function test_admin_can_delete_system_page(): void
    {
        $admin = Admin::create([
            'name' => 'Admin Sys Manager',
            'email' => 'sysmgr@test.com',
            'password' => 'secret123',
        ]);

        $sysPage = Page::create([
            'slug' => 'temp-system-page',
            'title_tr' => 'Geçici Sistem Sayfası',
            'title_en' => 'Temp System Page',
            'is_system' => true,
            'is_active' => true,
        ]);

        $this->actingAs($admin, 'admin');

        $deleteResponse = $this->delete(route('admin.pages.destroy', $sysPage->id));
        $deleteResponse->assertRedirect(route('admin.pages.index'));
        $this->assertDatabaseMissing('pages', ['id' => $sysPage->id]);
    }

    public function test_admin_can_toggle_page_status(): void
    {
        $admin = Admin::create([
            'name' => 'Admin Toggle Manager',
            'email' => 'togglemgr@test.com',
            'password' => 'secret123',
        ]);

        $page = Page::create([
            'slug' => 'test-toggle-page',
            'title_tr' => 'Toggle Test Sayfası',
            'title_en' => 'Toggle Test Page',
            'is_system' => false,
            'is_active' => true,
        ]);

        $this->actingAs($admin, 'admin');

        // Toggle from active to inactive
        $response = $this->patch(route('admin.pages.toggle-status', $page->id));
        $response->assertStatus(302);
        $page->refresh();
        $this->assertFalse($page->is_active);

        // Frontend should now return 404 for inactive page
        $frontendResponse = $this->get('/test-toggle-page');
        $frontendResponse->assertStatus(404);

        // Toggle back to active
        $response2 = $this->patch(route('admin.pages.toggle-status', $page->id));
        $response2->assertStatus(302);
        $page->refresh();
        $this->assertTrue($page->is_active);

        // Frontend should now return 200
        $frontendResponse2 = $this->get('/test-toggle-page');
        $frontendResponse2->assertStatus(200);
    }

    public function test_inactive_system_page_returns_404(): void
    {
        $page = Page::create([
            'slug' => 'references',
            'title_tr' => 'Referanslar',
            'title_en' => 'References',
            'is_system' => true,
            'is_active' => false,
        ]);

        $response = $this->get('/references');
        $response->assertStatus(404);
    }
}
