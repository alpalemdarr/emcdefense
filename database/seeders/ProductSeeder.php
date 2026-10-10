<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all()->keyBy('slug');

        $products = [
            0 => [
                'category_slug' => 'marx-generator',
                'name' => 'MARX GENERATOR',
                'model_number' => 'GENERATOR',
                'short_description' => 'Since 2002, EMC has been a proven developer of Advanced Electromagnetic Warfare Defence  Infrastructures, including HEMP protected power line filters, shielded...',
                'description' => 'Since 2002, EMC has been a proven developer of Advanced Electromagnetic Warfare Defence

Infrastructures, including HEMP protected power line filters, shielded chambers. Gigawatt

Peak Power, nanosecond Pulse width Marx Generators with low-inductance designs,

delivering faster rise times, higher peak voltages, and superior load efficiency are the key

elements of targeted HEMP & IEMI protection.

EMC Marx Generators are engineered for demanding pulsed-power applications such as HPM & IEMI,

MIL STD test infrastructures, Marx triggering, and dielectric breakdown research applications.',
                'specifications' => null,
                'datasheet_path' => null,
                'image_path' => null,
                'video_path' => 'videos/mj2.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 1,
            ],
            1 => [
                'category_slug' => 'filters',
                'name' => 'Power Line Filter and Signal Line Filter',
                'model_number' => null,
                'short_description' => 'Power Line FilterPower line filters are used to prevent potential information  leakage through power lines by blocking unwanted electromagnetic signals.They typ...',
                'description' => 'Power Line FilterPower line filters are used to prevent potential information

leakage through power lines by blocking unwanted electromagnetic signals.They typically provide at least 60 dB attenuation in

the 100 kHz – 1 GHz range, as described in NATO SDIP-29 (AMSG 719G).Signal Line FilterSignal line filters are used to prevent information leakage

through telephone, intercom, modem, and data lines.According to SDIP-29 (AMSG 719G), the filter must provide minimum 60 dB attenuation from 100× the operating frequency of the line up to 1 GHz.

 ',
                'specifications' => null,
                'datasheet_path' => null,
                'image_path' => 'products/emcfilter1.png',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 1,
            ],
            2 => [
                'category_slug' => 'chambers',
                'name' => 'EMC CHAMBERS',
                'model_number' => 'CHAMBERS',
                'short_description' => 'EMC Electronic delivers high-performance RF & EMC test environments engineered for absolute isolation and precision.  From full and semi-anechoic chambers to sh...',
                'description' => 'EMC Electronic delivers high-performance RF & EMC test environments engineered for absolute isolation and precision.

From full and semi-anechoic chambers to shielded rooms and custom RF boxes, every structure is built with superior shielding, optimized absorber performance, and optional acoustic insulation for complete environmental control.Used worldwide for EMC/EMI testing, microwave measurements, TEMPEST-grade information security, and radiological imaging rooms — our chambers provide uncompromising reliability where accuracy matters most.

Trusted worldwide. Built to perform.',
                'specifications' => null,
                'datasheet_path' => null,
                'image_path' => 'products/chamber.png',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 1,
            ],
            3 => [
                'category_slug' => 'rf-absorbers',
                'name' => 'Sub terahertz Absorber',
                'model_number' => 'Absorber',
                'short_description' => 'EMC Electronic uses different materials to provide excellent absorption performance at frequencies from 0.07 GHz to 330 GHz. Sub-Terahertz absorbers are produce...',
                'description' => 'EMC Electronic uses different materials to provide excellent absorption performance at frequencies from 0.07 GHz to 330 GHz. Sub-Terahertz absorbers are produced with balanced formulate of carbon black and fire-retardant materials in pyramidal shape of polyurethane foam base material. It is ideal to suppress side lobe of antennas and isolate the antennas.

0.07-330 GHz

Fire Retardant

Pyramidal Shape

Antenna Isolation

Performance Specifications

Minimum absorption performance values

Get a Quote',
                'specifications' => [
                    'Height (")' => '0.5',
                    '10 GHz' => '4 dB',
                    '18 GHz' => '6 dB',
                    '26 GHz' => '7 dB',
                    '40 GHz' => '10 dB',
                    '60 GHz' => '15 dB',
                    '90 GHz' => '20 dB',
                    '140 GHz' => '25 dB',
                    '220 GHz' => '30 dB',
                    '330 GHz' => '30 dB',
                ],
                'datasheet_path' => 'datasheets/absorber1.pdf',
                'image_path' => 'products/sta.png',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 1,
            ],
            4 => [
                'category_slug' => 'antennas',
                'name' => 'Rod Antenna',
                'model_number' => 'RA10K30M',
                'short_description' => 'Rod antenna is a vertical monopole designed for low-frequency electric field generation and measurement. Commonly used in EMC laboratories, it provides reliable...',
                'description' => 'Rod antenna is a vertical monopole designed for low-frequency electric field generation and measurement. Commonly used in EMC laboratories, it provides reliable E-field performance in the 9 kHz–30 MHz range, supporting standards such as MIL-STD-461 (RS101/RS103). Its simple ground-referenced structure makes it ideal for applications where loop antennas are insufficient, delivering stable and efficient low-frequency E-field operation.

Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'RA10K30M',
                    'FREQUENCY RANGE' => '9 kHz – 30 MHz',
                    'CONNECTOR TYPE' => 'N',
                    'ANTENNA FACTOR' => '10 dB ± 1.5 dB',
                    'CHARGING VOLTAGE' => '9 VDC',
                ],
                'datasheet_path' => 'datasheets/Rod_Antenna.pdf',
                'image_path' => null,
                'video_path' => 'videos/rod_antenna.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 1,
            ],
            5 => [
                'category_slug' => 'lisn',
                'name' => 'LISN: Line Impedance Stabilization Network',
                'model_number' => 'Network',
                'short_description' => 'A Line Impedance Stabilization Network (LISN) is connected between the Equipment Under Test (EUT) and the power source during conducted emission measurements....',
                'description' => 'A Line Impedance Stabilization Network (LISN) is connected between the Equipment Under Test (EUT) and the power source during conducted emission measurements.

It provides a stable, standardized line impedance for the EUT, routes unwanted RF noise generated by the EUT to the EMI receiver, and prevents noise coming from the mains supply from reaching the receiver.

At EMCTurkey, we manufacture LISNs with current ratings from 5 A to 200 A per line, fully compliant with the required EMC standards.',
                'specifications' => null,
                'datasheet_path' => 'datasheets/AdsYz_tasarYm.png',
                'image_path' => 'products/lisn.png',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 1,
            ],
            6 => [
                'category_slug' => 'cdn',
                'name' => 'CDN',
                'model_number' => null,
                'short_description' => 'CDN is used to inject the disturbing RF signal onto the cables of the EUT during conducted immunity testing according to EN 61000-4-6.  Upon request, we can man...',
                'description' => 'CDN is used to inject the disturbing RF signal onto the cables of the EUT during conducted immunity testing according to EN 61000-4-6.

Upon request, we can manufacture M, S, AF, and T type CDNs.

Get a Quote',
                'specifications' => null,
                'datasheet_path' => null,
                'image_path' => null,
                'video_path' => 'videos/cdn.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 1,
            ],
            7 => [
                'category_slug' => 'test-equipment',
                'name' => 'Transient Limiter',
                'model_number' => 'TL9K30M',
                'short_description' => 'Transient Limiter nedir?Transient Limiter, kablo üzerinden yayılan emisyon ölçümlerinde LISN  kaynaklı yüksek seviyeli ani işaretlere karşı ölçüm alıcısının RF...',
                'description' => 'Transient Limiter nedir?Transient Limiter, kablo üzerinden yayılan emisyon ölçümlerinde LISN

kaynaklı yüksek seviyeli ani işaretlere karşı ölçüm alıcısının RF girişini

korumak için kullanılır. Ayrıca düşük frekanslı sinyallerin ölçüm alıcısı

üzerindeki etkilerini önleyen yüksek geçiren filtreye

sahiptir. Konnektör tipi ve araya girme kaybı isteğe göre

değiştirilebilir. Transient Limiter, is used to protect RF input of the measuring receiver

against high-level transients caused by LISN in conducted emission

measurements. In addition, it has a high pass filter that prevents the effects

of low frequency signals on the measuring receiver. Connector type and

insertion loss is changeable upon request. ',
                'specifications' => [
                    'MODEL' => 'TL9K30M',
                    'FREQUENCY RANGE' => '9 kHz – 30 MHz',
                    'INSERTION LOSS' => '10 dB ± 0.5 dB',
                    'CONNECTOR TYPE' => 'N',
                ],
                'datasheet_path' => 'datasheets/TransientLimiter-TL9K30M_3.pdf',
                'image_path' => null,
                'video_path' => 'videos/transient_limiter__voltage_probe.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 1,
            ],
            8 => [
                'category_slug' => 'used-equipment',
                'name' => 'Osiloskop | Tektronix | 2225',
                'model_number' => '2225',
                'short_description' => 'Kullanım kılavuzu',
                'description' => 'Kullanım kılavuzu',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221208_091548.jpg',
                'image_path' => 'products/IMG_20221208_091519.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            9 => [
                'category_slug' => 'marx-generator',
                'name' => 'MIL STD 461 / RS 105 TEST PULSER',
                'model_number' => 'MIG05-20K00300',
                'short_description' => ' MIL STD 461 G / RS 105 TEST PULSER',
                'description' => ' MIL STD 461 G / RS 105 TEST PULSER',
                'specifications' => [
                    'MODEL NO' => 'MIG05-20K00300',
                    'OPENVOLTAGE' => '100 kV',
                    'ENERGY' => '9 J',
                    'RISE TIME' => '2 ns',
                    'FWHM' => '25 ns',
                    'ERECTEDCAPACITANCE' => '300 pF',
                    'IMPEDANCE' => '8 Ω',
                ],
                'datasheet_path' => 'datasheets/4-_MARX_GENERATOR_-_ARKA.pdf',
                'image_path' => 'products/461.png',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],
            10 => [
                'category_slug' => 'filters',
                'name' => 'TGH-16 Tempest Power Line Filter',
                'model_number' => 'TGH-16',
                'short_description' => 'Technical Specifications  Get a Quote',
                'description' => 'Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'TGH-16',
                    'STANDARDS' => 'MIL STD 220',
                    'PERFORMANCE' => '60 dB @ 100 kHz – 1 GHz',
                    'POWER FREQUENCY' => '50 / 60 Hz',
                    'RATED VOLTAGE' => '230 VAC',
                    'RATED CURRENT' => '16 A',
                    'MAX. CURRENT' => '22.5 A for 15 min.',
                    'DIMENSIONS (mm)' => '440 x 105 x 50',
                ],
                'datasheet_path' => 'datasheets/TGH-16.pdf',
                'image_path' => null,
                'video_path' => 'videos/tgh-16.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],
            11 => [
                'category_slug' => 'chambers',
                'name' => 'Anechoic Chamber',
                'model_number' => 'TYO3M',
                'short_description' => 'Technical Specifications  Get a Quote',
                'description' => 'Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'TYO3M',
                    'FREQUENCY RANGE' => '10 kHz – 18 GHz',
                    'MEASURING DISTANCE' => '3 m',
                    'EXTERNAL DIMENSIONS (WxHxD)' => '9.5 x 6 x 5.6 m',
                    'STANDARDS' => 'CISPR 16-1-4, IEC/EN 61000-4-3',
                    'SHIELDING PERFORMANCE' => 'SE > 100 dB',
                ],
                'datasheet_path' => null,
                'image_path' => 'products/yarY_yalYtYmlY.png',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],
            12 => [
                'category_slug' => 'rf-absorbers',
                'name' => 'Polyurethane Absorber',
                'model_number' => 'THP-300',
                'short_description' => 'RF Pyramid Absorber is obtained by loading polyurethane foam with carbon and fire-retardant chemicals to absorb electromagnetic energy. It has excellent reflect...',
                'description' => 'RF Pyramid Absorber is obtained by loading polyurethane foam with carbon and fire-retardant chemicals to absorb electromagnetic energy. It has excellent reflection loss performance over a wide frequency range.

Absorber performance is measured according to NRL Arch technique.

Fire resistance performance meets NRL 8093 I, II, III standards.

Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'THP-300',
                    'FREQUENCY RANGE' => '0.5 GHz - 40 GHz',
                ],
                'datasheet_path' => 'datasheets/RF_Yutucu-THP-300_1.pdf',
                'image_path' => null,
                'video_path' => 'videos/mavi_kopuk.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],
            13 => [
                'category_slug' => 'antennas',
                'name' => 'Biconical Antenna',
                'model_number' => 'BA30M200M',
                'short_description' => 'Biconical antenna is used to measure radiated emissions in the 30 MHz – 200/300 MHz frequency range according to standards such as CISPR, MIL, and ETSI. The ant...',
                'description' => 'Biconical antenna is used to measure radiated emissions in the 30 MHz – 200/300 MHz frequency range according to standards such as CISPR, MIL, and ETSI. The antenna consists of a balun and dual-cone elements. Upon request, it can also be designed as a transmitting antenna for immunity tests.

Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'BA30M200M',
                    'FREQUENCY RANGE' => '30 MHz – 200/300 MHz',
                    'ANTENNA FACTOR' => 'Individually calibrated',
                    'CONNECTOR TYPE' => 'N',
                ],
                'datasheet_path' => 'datasheets/Biconical_Antenna.pdf',
                'image_path' => null,
                'video_path' => 'videos/bikonik_anten.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],
            14 => [
                'category_slug' => 'lisn',
                'name' => 'LISN / LS032A2',
                'model_number' => 'LS032A2',
                'short_description' => 'Technical Specifications  Get a Quote',
                'description' => 'Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'LS032A2',
                    'STANDARD' => 'CISPR 16 – 1 – 2',
                    'FREQUENCY' => '150 kHz – 30 MHz',
                    'IMPEDANCE' => '50 µH // 50 Ω',
                    'CURRENT & VOLTAGE' => '2 × 32 A, 230 VAC',
                ],
                'datasheet_path' => null,
                'image_path' => null,
                'video_path' => 'videos/lisn032a2_1.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],
            15 => [
                'category_slug' => 'test-equipment',
                'name' => 'Absorbing Clamb',
                'model_number' => 'Clamb',
                'short_description' => 'Absorbing Clamp nedir?Yutucu Kelepçe, ev aletleri ve elektrikli aletler gibi test edilen  cihazların güç kablolarından yayılan istenmeyen bozulma gücünü ölçmek...',
                'description' => 'Absorbing Clamp nedir?Yutucu Kelepçe, ev aletleri ve elektrikli aletler gibi test edilen

cihazların güç kablolarından yayılan istenmeyen bozulma gücünü ölçmek için

kullanılır. Bozulma gücü P [dBpW], EMI alıcısında okunan gerilim değerine

[dBμV], kelepçe faktörü CF [dBpW/μV] eklenerek hesaplanır. Absorbing Clamp, is used to measure disturbance power radiated through the

power cables of tested devices such as domestic appliances and

electrical tools. The disturbance power P [dBpW], is

calculated by adding the clamp factor CF [dBpW/μV] to

the reading voltage at the EMI receiver [dBμV].  ',
                'specifications' => null,
                'datasheet_path' => 'datasheets/Absorbing_Clamp-AC301.pdf',
                'image_path' => null,
                'video_path' => 'videos/clamp_1.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],
            16 => [
                'category_slug' => 'used-equipment',
                'name' => 'Power Sensor | ANRITSU | MA4701A',
                'model_number' => 'MA4701A',
                'short_description' => 'Kullanım kılavuzu',
                'description' => 'Kullanım kılavuzu',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221207_171941.jpg',
                'image_path' => 'products/IMG_20221207_171951_1.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            17 => [
                'category_slug' => 'marx-generator',
                'name' => 'MIL STD 188 – 125 – 1 PCI',
                'model_number' => 'MIG15-20K12500',
                'short_description' => 'MIL STD 188 – 125 – 1 PCI TEST PULSER',
                'description' => 'MIL STD 188 – 125 – 1 PCI TEST PULSER',
                'specifications' => [
                    'MODEL NO' => 'MIG15-20K12500',
                    'OPENVOLTAGE' => '300 kV',
                    'ENERGY' => '650 J',
                    'RISE TIME' => '20 ns',
                    'FWHM' => '500 ns',
                    'ERECTEDCAPACITANCE' => '12.5 nF',
                    'IMPEDANCE' => '60Ω',
                ],
                'datasheet_path' => 'datasheets/4-_MARX_GENERATOR_-_ARKA_1.pdf',
                'image_path' => 'products/188.png',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],
            18 => [
                'category_slug' => 'filters',
                'name' => 'PCF-3 Portable Tempest Power Line Filter',
                'model_number' => 'PCF-3',
                'short_description' => 'Technical Specifications  Get a Quote',
                'description' => 'Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'PCF-3',
                    'STANDARDS' => 'MIL STD 220',
                    'PERFORMANCE' => '60 dB @ 100 kHz – 1 GHz',
                    'POWER FREQUENCY' => '50 / 60 Hz',
                    'RATED VOLTAGE' => '230 VAC',
                    'RATED CURRENT' => '3 A',
                    'MAX. CURRENT' => '5 A for 15 min.',
                    'DIMENSIONS (mm)' => '177 x 50 x 38',
                ],
                'datasheet_path' => 'datasheets/PCF-3.pdf',
                'image_path' => null,
                'video_path' => 'videos/pcf-3.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],
            19 => [
                'category_slug' => 'chambers',
                'name' => 'RF SHIELDED BOX / EK454545',
                'model_number' => 'EK454545',
                'short_description' => 'Technical Specifications  Get a Quote',
                'description' => 'Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'EK454545',
                    'FREQUENCY' => '800 MHz – 6 GHz',
                    'PERFORMANCE' => 'SE > 70 dB',
                    'DIMENSIONS (WxHxD) [cm]' => '45 x 45 x 45',
                ],
                'datasheet_path' => 'datasheets/45x45x45.pdf',
                'image_path' => null,
                'video_path' => 'videos/RF_kucuk_kutu.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],
            20 => [
                'category_slug' => 'rf-absorbers',
                'name' => 'Polypropylene Absorber',
                'model_number' => 'THP-300',
                'short_description' => 'RF Pyramid Absorber is obtained by loading polypropylene foam with carbon and fire-retardant chemicals to absorb electromagnetic energy. It has excellent reflec...',
                'description' => 'RF Pyramid Absorber is obtained by loading polypropylene foam with carbon and fire-retardant chemicals to absorb electromagnetic energy. It has excellent reflection loss performance over a wide frequency range.

Absorber performance is measured according to NRL Arch technique.

Fire resistance performance meets NRL 8093 I, II, III standards.

Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'THP-300',
                    'FREQUENCY RANGE' => '0.5 GHz - 40 GHz',
                ],
                'datasheet_path' => null,
                'image_path' => null,
                'video_path' => 'videos/siyah_kopuk.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],
            21 => [
                'category_slug' => 'antennas',
                'name' => 'Bilog Antenna',
                'model_number' => 'BLA30M1G',
                'short_description' => 'Bilog Antenna is a hybrid antenna combining a Logarithmic Periodic Antenna and a broadband balun. It is used to measure radiated emissions from 30 MHz to 1 GHz...',
                'description' => 'Bilog Antenna is a hybrid antenna combining a Logarithmic Periodic Antenna and a broadband balun. It is used to measure radiated emissions from 30 MHz to 1 GHz according to various standards with a single antenna. Wooden or composite antenna masts can be supplied as optional accessories. Its usable frequency range can be extended up to 3 GHz.

Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'BLA30M1G',
                    'FREQUENCY RANGE' => '30 MHz – 1 GHz',
                    'ANTENNA FACTOR' => 'Individually calibrated',
                    'CONNECTOR TYPE' => 'N',
                ],
                'datasheet_path' => 'datasheets/Bilog_Antenna.pdf',
                'image_path' => null,
                'video_path' => 'videos/bilog_antenna.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],
            22 => [
                'category_slug' => 'lisn',
                'name' => 'LISN / LS200A1',
                'model_number' => 'LS200A1',
                'short_description' => 'Technical Specifications  Get a Quote',
                'description' => 'Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'LS200A1',
                    'STANDARD' => 'CISPR 16 – 1 – 2',
                    'FREQUENCY' => '150 kHz – 30 MHz',
                    'IMPEDANCE' => '50 µH // 50 Ω',
                    'CURRENT & VOLTAGE' => '1 × 200 A, 500 VAC',
                ],
                'datasheet_path' => null,
                'image_path' => null,
                'video_path' => 'videos/ust.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],
            23 => [
                'category_slug' => 'test-equipment',
                'name' => 'Voltage Probe',
                'model_number' => 'VT01',
                'short_description' => 'Voltage Probe nedir?Test edilen ekipman şebekeden yüksek akım  çekiyorsa (örneğin: > 200 A), bu akımlarda ticari LISN bulunamıyorsa ya da  ekipman laboratuvara...',
                'description' => 'Voltage Probe nedir?Test edilen ekipman şebekeden yüksek akım

çekiyorsa (örneğin: > 200 A), bu akımlarda ticari LISN bulunamıyorsa ya da

ekipman laboratuvara taşınamıyorsa bu durumlarda kablo yoluyla yayılım

deneylerinde gerilim probu kullanılabilir.  Elektrik hatlarına

doğrudan bağlantı yapıldığı için dikkat edilmelidir.

Gerilim probu yayılan emisyonu azalttığı için kalibrasyon faktörleri

gereklidir. Voltage probe is used at

conducted emisison measurement which equipment under test requires

high input current (for example: > 200 A) and commercial LISNs may not be

available. A direct connection to the power lines is required and care must be

taken to establish a reference ground for the measurements. The

probe attenuates the voltage so calibration factors are

required.  ',
                'specifications' => [
                    'MODEL' => 'VT01',
                    'FREQUENCY RANGE' => '10 kHz – 30 MHz',
                    'INSERTION LOSS' => '2 dB',
                    'CONNECTOR TYPE' => 'BNC',
                ],
                'datasheet_path' => 'datasheets/TransientLimiter-TL9K30M_2.pdf',
                'image_path' => null,
                'video_path' => 'videos/highh_voltage_probe.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],
            24 => [
                'category_slug' => 'used-equipment',
                'name' => 'DC Panel Mater',
                'model_number' => 'Mater',
                'short_description' => 'DC Panel Mater - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'description' => 'DC Panel Mater - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221207_165057.jpg',
                'image_path' => 'products/IMG_20221207_165048.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            25 => [
                'category_slug' => 'marx-generator',
                'name' => 'DIRECTED RF ENERGY / HPM SOURCE',
                'model_number' => 'MIG23-20K08700',
                'short_description' => 'DIRECTED RF ENERGY / HPM SOURCE',
                'description' => 'DIRECTED RF ENERGY / HPM SOURCE',
                'specifications' => [
                    'MODEL NO' => 'MIG23-20K08700',
                    'OPENVOLTAGE' => '460 KV',
                    'ENERGY' => '920 J',
                    'RISE TIME' => '10 ns',
                    'FWHM' => '100 ns',
                    'ERECTEDCAPACITANCE' => '8.7 nF',
                    'IMPEDANCE' => '23Ω',
                ],
                'datasheet_path' => 'datasheets/4-_MARX_GENERATOR_-_ARKA_2.pdf',
                'image_path' => 'products/HPM_SOURCE.png',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            26 => [
                'category_slug' => 'filters',
                'name' => 'FL100E4 Tempest Power Line Filter',
                'model_number' => 'FL100E4',
                'short_description' => 'Technical Specifications  Get a Quote',
                'description' => 'Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'FL100E4',
                    'STANDARDS' => 'MIL STD 220, EN 55017',
                    'PERFORMANCE' => '100 dB @ 100 kHz – 1 GHz',
                    'POWER FREQUENCY' => '50 / 60 Hz',
                    'RATED VOLTAGE' => '380 VAC ±10% (Line to Line)',
                    'RATED CURRENT' => '4x100 A',
                    'MAX. CURRENT' => '130 A for 10 min.',
                    'DIMENSIONS (mm)' => '650 x 300 x 100',
                ],
                'datasheet_path' => 'datasheets/FL100E4.pdf',
                'image_path' => null,
                'video_path' => 'videos/buyuk_filtre.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            27 => [
                'category_slug' => 'chambers',
                'name' => 'RF SHIELDED BOX / EK804545',
                'model_number' => 'EK804545',
                'short_description' => 'Technical Specifications  Get a Quote',
                'description' => 'Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'EK804545',
                    'FREQUENCY' => '800 MHz - 6 GHz',
                    'PERFORMANCE' => 'SE > 70 dB',
                    'DIMENSIONS (WxHxD) [cm]' => '80 x 45 x 45',
                ],
                'datasheet_path' => null,
                'image_path' => null,
                'video_path' => 'videos/RF_buyuk_kutu.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            28 => [
                'category_slug' => 'antennas',
                'name' => 'Large Horn Antenna ( 200 MHz - 1 GHz )',
                'model_number' => 'HA200M1G',
                'short_description' => 'Large Horn Antenna is used to measure radiated emissions in the 200 MHz – 1 GHz frequency range according to standards such as CISPR, ETSI, and especially MIL-S...',
                'description' => 'Large Horn Antenna is used to measure radiated emissions in the 200 MHz – 1 GHz frequency range according to standards such as CISPR, ETSI, and especially MIL-STD-461. A wooden antenna mast can be supplied as an optional accessory.

Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'HA200M1G',
                    'FREQUENCY RANGE' => '200 MHz – 1 GHz',
                    'ANTENNA FACTOR' => 'Individually calibrated',
                    'CONNECTOR TYPE' => 'N',
                ],
                'datasheet_path' => 'datasheets/Large_Horn-HA200M1G.pdf',
                'image_path' => null,
                'video_path' => 'videos/large_horn_antenna.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            29 => [
                'category_slug' => 'lisn',
                'name' => 'LISN / LS100D1',
                'model_number' => 'LS100D1',
                'short_description' => 'Technical Specifications  Get a Quote',
                'description' => 'Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'LS100D1',
                    'STANDARD' => 'CISPR 25',
                    'FREQUENCY' => '100 kHz – 100 MHz',
                    'IMPEDANCE' => '5 µH // 50 Ω',
                    'CURRENT & VOLTAGE' => '1 × 200 A, 1000 VDC',
                ],
                'datasheet_path' => null,
                'image_path' => null,
                'video_path' => 'videos/lisn100d1_1.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            30 => [
                'category_slug' => 'test-equipment',
                'name' => 'CMAD (COMMON MODE ABSORPTION DEVICE )',
                'model_number' => null,
                'short_description' => 'CMAD, ev  aletleri ve elektrikli aletler gibi test edilmiş cihazların kabloları üzerinden  istenmeyen ortak mod akımlarını önlemek için kullanılır. CMAD, is use...',
                'description' => 'CMAD, ev

aletleri ve elektrikli aletler gibi test edilmiş cihazların kabloları üzerinden

istenmeyen ortak mod akımlarını önlemek için kullanılır. CMAD, is used

to prevent unwanted common mode currents through cables of tested devices such

as domestic appliances and electrical tools. 

 ',
                'specifications' => null,
                'datasheet_path' => null,
                'image_path' => null,
                'video_path' => 'videos/clamp.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            31 => [
                'category_slug' => 'used-equipment',
                'name' => 'Isolation Transformer | Erika Fiedler OHG',
                'model_number' => 'Erika Fiedler OHG',
                'short_description' => 'Isolation Transformer | Erika Fiedler OHG - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'description' => 'Isolation Transformer | Erika Fiedler OHG - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221207_172014.jpg',
                'image_path' => 'products/IMG_20221207_172009.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 4,
            ],
            32 => [
                'category_slug' => 'filters',
                'name' => 'FL005DC Tempest Power Line Filter',
                'model_number' => 'FL005DC',
                'short_description' => 'Technical Specifications  Get a Quote',
                'description' => 'Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'FL005DC',
                    'STANDARDS' => 'MIL STD 220, EN 55017',
                    'PERFORMANCE' => '60 dB @ 100 kHz – 1 GHz',
                    'POWER FREQUENCY' => 'DC',
                    'RATED VOLTAGE' => '48 VDC',
                    'RATED CURRENT' => '2x5 A',
                    'MAX. CURRENT' => '7.5A for 10 min.',
                    'DIMENSIONS (mm)' => '350 x 105 x 60',
                ],
                'datasheet_path' => 'datasheets/FL005DC-V0.pdf',
                'image_path' => null,
                'video_path' => 'videos/filterere_3_1.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 5,
            ],
            33 => [
                'category_slug' => 'antennas',
                'name' => 'Double Ridge Horn Antenna',
                'model_number' => 'HA1G18G',
                'short_description' => 'Double Ridge Horn Antenna is used to measure radiated emissions in the 1 GHz – 18 GHz frequency range according to standards such as CISPR, ETSI, and MIL-STD-46...',
                'description' => 'Double Ridge Horn Antenna is used to measure radiated emissions in the 1 GHz – 18 GHz frequency range according to standards such as CISPR, ETSI, and MIL-STD-461. A wooden antenna mast can be supplied as an optional accessory.

Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'HA1G18G',
                    'FREQUENCY RANGE' => '1 GHz – 18 GHz',
                    'ANTENNA FACTOR' => 'Individually calibrated',
                    'CONNECTOR TYPE' => 'N',
                ],
                'datasheet_path' => 'datasheets/Doube_Ridge_Horn-HA1G18G.pdf',
                'image_path' => null,
                'video_path' => 'videos/double_ridge.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 5,
            ],
            34 => [
                'category_slug' => 'lisn',
                'name' => 'LISN ( TRİFAZE )',
                'model_number' => 'LS032A4',
                'short_description' => 'Technical Specifications  Get a Quote',
                'description' => 'Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'LS032A4',
                    'STANDARD' => 'CISPR 16 – 1 – 2',
                    'FREQUENCY' => '150 kHz – 30 MHz',
                    'IMPEDANCE' => '50 µH // 50 Ω',
                    'CURRENT & VOLTAGE' => '4 × 32 A, 400 VAC',
                ],
                'datasheet_path' => null,
                'image_path' => null,
                'video_path' => 'videos/lisn_trifaze.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 5,
            ],
            35 => [
                'category_slug' => 'test-equipment',
                'name' => 'High Voltage Probe',
                'model_number' => 'HV500X',
                'short_description' => 'HV koaksiyel  prob, MIL STD 461\'e göre CS115 ve CS116 kalibrasyonu yapılırken kabloya enjekte  edilen darbeyi ölçmek için tasarlanmıştır. 500x gerilim bölme ora...',
                'description' => 'HV koaksiyel

prob, MIL STD 461\'e göre CS115 ve CS116 kalibrasyonu yapılırken kabloya enjekte

edilen darbeyi ölçmek için tasarlanmıştır. 500x gerilim bölme oranına sahip

olup  kullanılabilir bant genişliği 400 MHz\'dir.

 HV coaxial

probe/attenuator was designed to measure injected pulse to cable when

performing CS115 and CS116 calibration according to MIL STD 461. It has 500x

voltage divider ratio. Its usable bandwidth is 400 MHz.

 ',
                'specifications' => [
                    'MODEL' => 'HV500X',
                ],
                'datasheet_path' => 'datasheets/High_Voltage_Probe-HV500X.pdf',
                'image_path' => null,
                'video_path' => 'videos/highh_voltage_probe_1.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 5,
            ],
            36 => [
                'category_slug' => 'used-equipment',
                'name' => 'HP | Distortion Analizer | 8903E',
                'model_number' => '8903E',
                'short_description' => 'HP | Distortion Analizer | 8903E - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'description' => 'HP | Distortion Analizer | 8903E - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221208_092551.jpg',
                'image_path' => 'products/IMG_20221208_092524.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 5,
            ],
            37 => [
                'category_slug' => 'filters',
                'name' => 'USB Data Filter',
                'model_number' => 'USB10X',
                'short_description' => 'Data Line Filter USB10X, was designed for USB 2.0 ports for shielded enclosure/box applications. This filter provides at least 60 dB attenuation in the 1 GHz –...',
                'description' => 'Data Line Filter USB10X, was designed for USB 2.0 ports for shielded enclosure/box applications. This filter provides at least 60 dB attenuation in the 1 GHz – 6 GHz frequency range.

Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'USB10X',
                    'PERFORMANCE' => '60 dB @ 2 GHz – 6 GHz',
                    'DIMENSIONS (mm)' => '120 x 110 x 30',
                ],
                'datasheet_path' => 'datasheets/USB10X.pdf',
                'image_path' => null,
                'video_path' => 'videos/usb_data.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 6,
            ],
            38 => [
                'category_slug' => 'antennas',
                'name' => 'Halka Sensör / Loop Sensor',
                'model_number' => 'RLRE101',
                'short_description' => 'Loop Sensor RLRE101 is used to measure radiated magnetic field emissions according to MIL-STD-461.  Technical Specifications  Get a Quote',
                'description' => 'Loop Sensor RLRE101 is used to measure radiated magnetic field emissions according to MIL-STD-461.

Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'RLRE101',
                    'NUMBER OF TURNS' => '36',
                    'FREQUENCY RANGE' => '30 Hz – 500 kHz',
                    'DIAMETER' => '133 mm',
                    'ANTENNA FACTOR' => 'Individually calibrated',
                    'CONNECTOR TYPE' => 'BNC',
                ],
                'datasheet_path' => 'datasheets/LoopSensor-RLRE101.pdf',
                'image_path' => null,
                'video_path' => 'videos/recieving_loop_antenna.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 6,
            ],
            39 => [
                'category_slug' => 'lisn',
                'name' => 'LISN (1-phase)',
                'model_number' => 'LS016A2',
                'short_description' => 'Technical Specifications  Get a Quote',
                'description' => 'Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'LS016A2',
                    'STANDARD' => 'CISPR 16 – 1 – 2',
                    'FREQUENCY' => '9 kHz – 30 MHz',
                    'IMPEDANCE' => '(50 µH + 5 Ω) // 50 Ω',
                    'CURRENT & VOLTAGE' => '2 × 16 A, 230 VAC',
                ],
                'datasheet_path' => null,
                'image_path' => null,
                'video_path' => 'videos/alt.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 6,
            ],
            40 => [
                'category_slug' => 'test-equipment',
                'name' => 'Calibration Fixture',
                'model_number' => 'KF114',
                'short_description' => 'Kalibrasyon  Fikstürü, MIL STD 461\'e göre CS114, CS115 ve CS116 kalibrasyonu yapılırken  kabloya enjekte edilen bozulma sinyalini ölçmek için tasarlanmıştır.  K...',
                'description' => 'Kalibrasyon

Fikstürü, MIL STD 461\'e göre CS114, CS115 ve CS116 kalibrasyonu yapılırken

kabloya enjekte edilen bozulma sinyalini ölçmek için tasarlanmıştır.

Kullanılabilir bant genişliği 400 MHz\'dir.

Calibration Fixture was

designed to measure injected disturbance signal to cable when performing CS114, CS115

and CS116 calibration according to MIL STD 461. Its usable bandwidth is

400 MHz.  ',
                'specifications' => [
                    'MODEL' => 'KF114',
                    'FREQUENCY RANGE' => 'DC – 500 MHz',
                    'VSWR' => '<  3.5',
                    'CONNECTOR TYPE' => 'N',
                ],
                'datasheet_path' => 'datasheets/Calibration_Fixture-KF114.pdf',
                'image_path' => null,
                'video_path' => 'videos/emc_logo.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 6,
            ],
            41 => [
                'category_slug' => 'used-equipment',
                'name' => 'HP | S PARAMETERS TEST | 8503A',
                'model_number' => '8503A',
                'short_description' => 'Kullanım kılavuzu',
                'description' => 'Kullanım kılavuzu',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221207_164925.jpg',
                'image_path' => 'products/IMG_20221207_164851.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 6,
            ],
            42 => [
                'category_slug' => 'filters',
                'name' => 'SM5-3.4K Tempest Signal Line Filter',
                'model_number' => 'SM5-3.4K',
                'short_description' => 'Technical Specifications  Get a Quote',
                'description' => 'Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'SM5-3.4K',
                    'NUMBER OF LINES' => '5 pairs',
                    'PERFORMANCE' => '60 dB @ 30 kHz – 1 GHz',
                    'CUT-OFF FREQUENCY' => '13 kHz (3 dB)',
                    'RATED VOLTAGE' => '400 VDC',
                    'RATED CURRENT' => '120 A',
                    'DIMENSIONS (mm)' => '140 x 115 x 23',
                ],
                'datasheet_path' => 'datasheets/SM5-3.4K_1.pdf',
                'image_path' => null,
                'video_path' => 'videos/iYaret_hattY_filtresi2_2.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 7,
            ],
            43 => [
                'category_slug' => 'antennas',
                'name' => 'Radiating Loop & Field Monitor Loop Antenna',
                'model_number' => 'SL040',
                'short_description' => 'Radiating Loop RL120 is used to generate magnetic fields for RS101 tests according to MIL-STD-461.  Technical Specifications  Get a Quote  Field Monitor Loop An...',
                'description' => 'Radiating Loop RL120 is used to generate magnetic fields for RS101 tests according to MIL-STD-461.

Technical Specifications

Get a Quote

Field Monitor Loop Antenna SL040 is used to measure the magnetic field generated in the RS101 calibration procedure according to MIL-STD-461.

Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'SL040',
                    'FREQUENCY RANGE' => '30 Hz – 100 kHz',
                    'NUMBER OF TURNS' => '51',
                    'MAG. FIELD AT 5 cm' => '159.55 dBpT @ 1 A',
                    'DIAMETER' => '40 mm',
                    'MAX. CURRENT' => '16 A',
                    'CONNECTOR TYPE' => 'BNC',
                    'ANTENNA FACTOR' => 'Individually calibrated',
                ],
                'datasheet_path' => 'datasheets/RadiatingLoop-RL120.pdf',
                'image_path' => null,
                'video_path' => 'videos/radiating_loop.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 7,
            ],
            44 => [
                'category_slug' => 'test-equipment',
                'name' => 'ESD Current Target',
                'model_number' => 'ESDTRGT',
                'short_description' => 'Koaksiyel Akım Hedefi, MIL STD 461 veya EN 61000-4-2\'ye göre kalibrasyon  gerçekleştirirken ESD jeneratörlerinin deşarj akımını ölçmek için  tasarlanmıştır. ESD...',
                'description' => 'Koaksiyel Akım Hedefi, MIL STD 461 veya EN 61000-4-2\'ye göre kalibrasyon

gerçekleştirirken ESD jeneratörlerinin deşarj akımını ölçmek için

tasarlanmıştır. ESD akım  hedefini koaksiyel konnektöre

dönüştüren bir adaptör, zayıflatıcı ve RF kablo istek üzerine sağlanır. Coaxial Current Target was designed to measure the discharge current of ESD

generators when performing calibration according to MIL STD 461 or EN

61000-4-2. An adaptor which convert the current target

to coaxcial connector, attenuator and RF cable are supplied

upon request. 

 ',
                'specifications' => [
                    'MODEL' => 'ESDTRGT',
                    'Transfer Impedance @ 1 A (Zsys)' => '0.19 ( Target + 20 dB Attenuator + Cable Chain )',
                    'NOMINAL VALUE' => '± 0.5 dB @ up to 1 GHz ± 1.2 dB @ 1 GHz to 4 GHz',
                    'CONNECTOR TYPE' => 'SMA',
                ],
                'datasheet_path' => 'datasheets/ESD_Current_Target-ESDTRGT.pdf',
                'image_path' => null,
                'video_path' => 'videos/esd_current_target.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 7,
            ],
            45 => [
                'category_slug' => 'used-equipment',
                'name' => 'Verification Test | ar KALMUS | LA500H-CE',
                'model_number' => 'LA500H-CE',
                'short_description' => 'Verification Test | ar KALMUS | LA500H-CE - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'description' => 'Verification Test | ar KALMUS | LA500H-CE - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221208_092811.jpg',
                'image_path' => 'products/IMG_20221208_092749.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 7,
            ],
            46 => [
                'category_slug' => 'antennas',
                'name' => 'Standard Gain Horn Antenna',
                'model_number' => 'SH284S10',
                'short_description' => 'Standard Gain Horn Antenna is used to measure radiated emissions or to generate radiated fields. It can be designed for the 300 MHz – 40 GHz frequency range wit...',
                'description' => 'Standard Gain Horn Antenna is used to measure radiated emissions or to generate radiated fields. It can be designed for the 300 MHz – 40 GHz frequency range with 10, 15, or 20 dB gain upon request. A wooden antenna mast can be supplied as an optional accessory.

Technical Specifications

Get a Quote',
                'specifications' => [
                    'MODEL' => 'SH284S10',
                    'FREQUENCY RANGE' => '2.6 GHz – 3.95 GHz',
                    'CONNECTOR TYPE' => 'SMA',
                    'ANTENNA FACTOR' => 'Individually calibrated',
                    'GAIN' => '10 dB',
                ],
                'datasheet_path' => 'datasheets/Standard_Gain_Horn-SH2784S10.pdf',
                'image_path' => null,
                'video_path' => 'videos/standart_gain.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 8,
            ],
            47 => [
                'category_slug' => 'test-equipment',
                'name' => 'Isolation Transformer',
                'model_number' => 'TR11',
                'short_description' => 'İzolasyon Trafosu nedir? Hangi amaçla kullanılır?  İzolasyon Trafosu CS 101 deneyinde  osiloskobun besleme hattında topraklamanın izole edilmesi için kullanılır...',
                'description' => 'İzolasyon Trafosu nedir? Hangi amaçla kullanılır?

İzolasyon Trafosu CS 101 deneyinde

osiloskobun besleme hattında topraklamanın izole edilmesi için kullanılır. ',
                'specifications' => [
                    'MODEL' => 'TR11',
                    'MAX. CURRENT' => '10 A',
                ],
                'datasheet_path' => null,
                'image_path' => null,
                'video_path' => 'videos/Isolation_Transformer.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 8,
            ],
            48 => [
                'category_slug' => 'used-equipment',
                'name' => 'RF Attentuator | Lodesta | 087E-1',
                'model_number' => '087E-1',
                'short_description' => 'RF Attentuator | Lodesta | 087E-1 - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'description' => 'RF Attentuator | Lodesta | 087E-1 - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221207_171203.jpg',
                'image_path' => 'products/IMG_20221207_171020.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 8,
            ],
            49 => [
                'category_slug' => 'test-equipment',
                'name' => 'Feedthru Capacitor',
                'model_number' => 'FC10',
                'short_description' => 'Feedthru Kapasitör nedir? Hangi amaçla kullanılır?  Feedthru kapasitör CS 101 deneyinde bozucu işaretin şebeke  tarafına geçmesini engellemek için kullanılır.',
                'description' => 'Feedthru Kapasitör nedir? Hangi amaçla kullanılır?

Feedthru kapasitör CS 101 deneyinde bozucu işaretin şebeke

tarafına geçmesini engellemek için kullanılır.',
                'specifications' => [
                    'MODEL' => 'FC10',
                ],
                'datasheet_path' => null,
                'image_path' => null,
                'video_path' => 'videos/feedthru_capacitor.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 9,
            ],
            50 => [
                'category_slug' => 'used-equipment',
                'name' => 'Loudspeaker load',
                'model_number' => 'load',
                'short_description' => 'Loudspeaker load - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'description' => 'Loudspeaker load - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221207_173156.jpg',
                'image_path' => 'products/IMG_20221207_173200.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 9,
            ],
            51 => [
                'category_slug' => 'test-equipment',
                'name' => 'Current Shunt',
                'model_number' => '300WRS',
                'short_description' => 'Current Shunt nedir? Hangi amaçla kullanılır?  Current Shunt, CS101 deneyinde uygulanacak bozucu işareti  kalibre etmek için kullanılır.',
                'description' => 'Current Shunt nedir? Hangi amaçla kullanılır?

Current Shunt, CS101 deneyinde uygulanacak bozucu işareti

kalibre etmek için kullanılır.',
                'specifications' => [
                    'MODEL' => '300WRS',
                    'PERFORMANCE' => '0,5 Ω',
                ],
                'datasheet_path' => null,
                'image_path' => null,
                'video_path' => 'videos/current_shunt.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 10,
            ],
            52 => [
                'category_slug' => 'used-equipment',
                'name' => 'Loudspeaker stop filter',
                'model_number' => null,
                'short_description' => 'Loudspeaker stop filter - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'description' => 'Loudspeaker stop filter - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221207_172916.jpg',
                'image_path' => 'products/IMG_20221207_172923.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 10,
            ],
            53 => [
                'category_slug' => 'test-equipment',
                'name' => 'Coupling Transformer',
                'model_number' => null,
                'short_description' => 'Coupling Transformer nedir? Hangi amaçla kullanılır?  Coupling Transformer CS101 deneyinde bozucu işareti deneye  giren cihazın besleme hattına bulaştırmak için...',
                'description' => 'Coupling Transformer nedir? Hangi amaçla kullanılır?

Coupling Transformer CS101 deneyinde bozucu işareti deneye

giren cihazın besleme hattına bulaştırmak için kullanılır. ',
                'specifications' => null,
                'datasheet_path' => null,
                'image_path' => null,
                'video_path' => 'videos/Coupling_Transformer.mp4',
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 11,
            ],
            54 => [
                'category_slug' => 'used-equipment',
                'name' => 'Mains stop filter (M)',
                'model_number' => null,
                'short_description' => 'Mains stop filter (M) - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'description' => 'Mains stop filter (M) - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221207_172638.jpg',
                'image_path' => 'products/IMG_20221207_172647.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 11,
            ],
            55 => [
                'category_slug' => 'test-equipment',
                'name' => 'Calibration Load 5 oHm',
                'model_number' => 'oHm',
                'short_description' => 'Calibration Load nedir? Hangi amaçla kullanılır?  Calibration Load 5 Ω CS106 deneyinde darbe şeklini doğrulamak  için kullanılır.',
                'description' => 'Calibration Load nedir? Hangi amaçla kullanılır?

Calibration Load 5 Ω CS106 deneyinde darbe şeklini doğrulamak

için kullanılır.',
                'specifications' => [
                    'PERFORMANCE' => '5 Ω',
                ],
                'datasheet_path' => null,
                'image_path' => 'products/Calibration_Load_5_oHm-removebg-preview.png',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 12,
            ],
            56 => [
                'category_slug' => 'used-equipment',
                'name' => 'Mains stop filter (MSF)',
                'model_number' => null,
                'short_description' => 'Mains stop filter (MSF) - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'description' => 'Mains stop filter (MSF) - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221207_173019.jpg',
                'image_path' => 'products/IMG_20221207_173037.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 12,
            ],
            57 => [
                'category_slug' => 'used-equipment',
                'name' => 'Matching trasfer',
                'model_number' => 'trasfer',
                'short_description' => 'Matching trasfer - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'description' => 'Matching trasfer - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221208_091152.jpg',
                'image_path' => 'products/IMG_20221208_091156_1.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 13,
            ],
            58 => [
                'category_slug' => 'used-equipment',
                'name' => 'Scanner | Microscan | ms-610',
                'model_number' => 'ms-610',
                'short_description' => 'Datasheet',
                'description' => 'Datasheet',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221207_165555.jpg',
                'image_path' => 'products/IMG_20221207_165550.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 14,
            ],
            59 => [
                'category_slug' => 'used-equipment',
                'name' => 'Oscilloscope | National | vp5220a',
                'model_number' => 'vp5220a',
                'short_description' => 'Oscilloscope | National | vp5220a - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'description' => 'Oscilloscope | National | vp5220a - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221208_090811.jpg',
                'image_path' => 'products/IMG_20221208_090747.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 15,
            ],
            60 => [
                'category_slug' => 'used-equipment',
                'name' => 'Colour TV Pattern Generator | Philips | PM5518TN',
                'model_number' => 'PM5518TN',
                'short_description' => 'Kullanım kılavuzu',
                'description' => 'Kullanım kılavuzu',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221207_170654.jpg',
                'image_path' => 'products/IMG_20221207_170521.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 16,
            ],
            61 => [
                'category_slug' => 'used-equipment',
                'name' => 'High Resolution Programmable Timer/Counter | Philips | PM6680B',
                'model_number' => 'PM6680B',
                'short_description' => 'Kullanım kılavuzu',
                'description' => 'Kullanım kılavuzu',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221207_164505.jpg',
                'image_path' => 'products/IMG_20221207_164457.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 17,
            ],
            62 => [
                'category_slug' => 'used-equipment',
                'name' => 'Philips | PM9547 G',
                'model_number' => 'PM9547 G',
                'short_description' => 'Philips | PM9547 G - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'description' => 'Philips | PM9547 G - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221208_094240.jpg',
                'image_path' => 'products/IMG_20221208_094233.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 18,
            ],
            63 => [
                'category_slug' => 'used-equipment',
                'name' => 'Audio Analyzer | Rohde Schwarz',
                'model_number' => 'Rohde Schwarz',
                'short_description' => 'Kullanım kılavuzu',
                'description' => 'Kullanım kılavuzu',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221208_092319.jpg',
                'image_path' => 'products/IMG_20221208_092245.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 19,
            ],
            64 => [
                'category_slug' => 'used-equipment',
                'name' => 'Audio Analyzer | Rohde Schwarz',
                'model_number' => 'Rohde Schwarz',
                'short_description' => 'Audio Analyzer | Rohde Schwarz - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'description' => 'Audio Analyzer | Rohde Schwarz - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221208_091421.jpg',
                'image_path' => 'products/IMG_20221208_091343.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 20,
            ],
            65 => [
                'category_slug' => 'used-equipment',
                'name' => 'Rohde Schwarz | IMS',
                'model_number' => 'IMS',
                'short_description' => 'Kullanım kılavuzu',
                'description' => 'Kullanım kılavuzu',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221208_092146.jpg',
                'image_path' => 'products/IMG_20221208_092059.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 21,
            ],
            66 => [
                'category_slug' => 'used-equipment',
                'name' => 'mpeg2 Measurment Generator DVG | Rohde Schwarz',
                'model_number' => 'Rohde Schwarz',
                'short_description' => 'Datasheet',
                'description' => 'Datasheet',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221207_164633.jpg',
                'image_path' => 'products/IMG_20221207_164609.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 22,
            ],
            67 => [
                'category_slug' => 'used-equipment',
                'name' => 'RF System Model | Rohde Schwarz',
                'model_number' => 'Rohde Schwarz',
                'short_description' => 'RF System Model | Rohde Schwarz - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'description' => 'RF System Model | Rohde Schwarz - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221208_090652.jpg',
                'image_path' => 'products/IMG_20221208_090705.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 23,
            ],
            68 => [
                'category_slug' => 'used-equipment',
                'name' => 'TV Generator PAL | Rohde Schwarz',
                'model_number' => 'Rohde Schwarz',
                'short_description' => 'Datasheet',
                'description' => 'Datasheet',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221207_164749.jpg',
                'image_path' => 'products/IMG_20221207_164736.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 24,
            ],
            69 => [
                'category_slug' => 'used-equipment',
                'name' => 'TV Generator NTSC | Rohde Schwarz',
                'model_number' => 'Rohde Schwarz',
                'short_description' => 'Datasheet',
                'description' => 'Datasheet',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221208_091120.jpg',
                'image_path' => 'products/IMG_20221208_091112.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 25,
            ],
            70 => [
                'category_slug' => 'used-equipment',
                'name' => 'TV Generator SECAM | Rohde Schwarz',
                'model_number' => 'Rohde Schwarz',
                'short_description' => 'Datasheet',
                'description' => 'Datasheet',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221208_091044.jpg',
                'image_path' => 'products/IMG_20221208_091038.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 26,
            ],
            71 => [
                'category_slug' => 'used-equipment',
                'name' => 'TV Messender TV Test Transmitter SFM | Rohde Schwarz',
                'model_number' => 'Rohde Schwarz',
                'short_description' => 'TV Messender TV Test Transmitter SFM | Rohde Schwarz - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'description' => 'TV Messender TV Test Transmitter SFM | Rohde Schwarz - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221208_091243.jpg',
                'image_path' => 'products/IMG_20221208_091222.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 27,
            ],
            72 => [
                'category_slug' => 'used-equipment',
                'name' => 'TV Messender TV Test Transmitter SFQ | Rohde Schwarz',
                'model_number' => 'Rohde Schwarz',
                'short_description' => 'Kullanım kılavuzu',
                'description' => 'Kullanım kılavuzu',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221207_164125_1.jpg',
                'image_path' => 'products/IMG_20221207_164031_1.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 28,
            ],
            73 => [
                'category_slug' => 'used-equipment',
                'name' => 'Selektra Löttechnik',
                'model_number' => 'ttechnik',
                'short_description' => 'Selektra Löttechnik - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'description' => 'Selektra Löttechnik - High performance RF and EMC defense testing solution engineered for precision and reliability.',
                'specifications' => null,
                'datasheet_path' => 'datasheets/IMG_20221208_091735.jpg',
                'image_path' => 'products/IMG_20221208_091715_1.jpg',
                'video_path' => null,
                'quote_email' => 'teklif@emcelectronic.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 29,
            ],
        ];

        foreach ($products as $p) {
            $cat = $categories->get($p['category_slug']);
            if (! $cat) {
                continue;
            }

            Product::updateOrCreate(
                [
                    'category_id' => $cat->id,
                    'name' => $p['name'],
                ],
                [
                    'model_number' => $p['model_number'],
                    'short_description' => $p['short_description'],
                    'description' => $p['description'],
                    'specifications' => $p['specifications'],
                    'datasheet_path' => $p['datasheet_path'],
                    'image_path' => $p['image_path'],
                    'video_path' => $p['video_path'],
                    'quote_email' => $p['quote_email'],
                    'is_used_equipment' => $p['is_used_equipment'],
                    'is_active' => $p['is_active'],
                    'sort_order' => $p['sort_order'],
                ]
            );
        }
    }
}
