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
            // ── 1. MARX GENERATOR ──
            [
                'category_slug' => 'marx-generator',
                'name' => 'Marx Generator RS105 (MIL-STD-461)',
                'model_number' => 'MG-RS105-50K',
                'short_description' => 'Fast rise-time radiated susceptibility pulse generator engineered for MIL-STD-461 RS105 transient electromagnetic testing.',
                'description' => 'The MG-RS105-50K Marx Generator is specifically developed for high-altitude electromagnetic pulse (HEMP) simulation in compliance with MIL-STD-461 RS105 requirements. It generates extremely fast double-exponential impulses with sub-nanosecond rise times and wide plate voltage control. Built with gas-pressurized spark gap switches and low-inductance energy storage stages.',
                'specifications' => [
                    'Rise Time' => '1.8 ns - 2.8 ns (Compliant with MIL-STD-461 RS105)',
                    'Pulse Width (FWHM)' => '18 ns - 28 ns',
                    'Peak Electric Field' => 'Up to 50 kV/m (TEM Horn / Bounded Wave Simulator)',
                    'Charge Voltage' => '0 - 100 kV DC adjustable',
                    'Output Impedance' => '50 Ohm matched',
                    'Trigger Mode' => 'Fiber-optic isolated remote trigger & manual pulse',
                    'Standard' => 'MIL-STD-461E/F/G, DEF-STAN 59-411',
                ],
                'datasheet_path' => 'datasheets/sample_datasheet.pdf',
                'quote_email' => 'defense@emcdefence.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'category_slug' => 'marx-generator',
                'name' => 'HEMP Marx Generator (MIL-STD-188-125-1)',
                'model_number' => 'MG-188-100K',
                'short_description' => 'High-voltage pulsed power simulator designed for facility barrier testing under MIL-STD-188-125-1 Early-Time (E1) conditions.',
                'description' => 'The MG-188-100K is designed for testing mission-critical command and control shelters, data centers, and military facilities against High-Altitude Electromagnetic Pulse (HEMP) E1 pulses. High energy discharge with integrated crowbar and peaking circuit.',
                'specifications' => [
                    'Peak Open Circuit' => '> 120 kV',
                    'Rise Time' => '< 2.5 ns',
                    'FWHM' => '20 - 30 ns',
                    'Pulse Energy' => '250 Joules',
                    'Shielding Level' => 'Complete RF shielded console',
                    'Control Interface' => 'Fiber optic Ethernet / LabVIEW API',
                ],
                'datasheet_path' => 'datasheets/sample_datasheet.pdf',
                'quote_email' => 'defense@emcdefence.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'category_slug' => 'marx-generator',
                'name' => 'DRMG20 Damped Sinusoidal Generator',
                'model_number' => 'DRMG-20-CS116',
                'short_description' => 'MIL-STD-461 CS116 damped sinusoid transient generator for conducted susceptibility testing on power and signal lines.',
                'description' => 'Produces damped sinusoidal transients at frequencies of 10 kHz, 100 kHz, 1 MHz, 10 MHz, 30 MHz, and 100 MHz. Fully software-controlled with calibrated injection probes and automated calibration routines.',
                'specifications' => [
                    'Frequencies' => '10 kHz, 100 kHz, 1 MHz, 10 MHz, 30 MHz, 100 MHz',
                    'Peak Current' => 'Up to 10 A into calibration fixture',
                    'Damping Factor (Q)' => '15 ± 5',
                    'Repetition Rate' => '0.5 to 1.0 Hz or manual pulse',
                    'Coupling Mode' => 'Inductive injection probe',
                ],
                'datasheet_path' => 'datasheets/sample_datasheet.pdf',
                'quote_email' => 'defense@emcdefence.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],

            // ── 2. FILTERS ──
            [
                'category_slug' => 'filters',
                'name' => 'Power Line Filter TGH-16 (TEMPEST SDIP-27)',
                'model_number' => 'TGH-16',
                'short_description' => 'Ultra high attenuation 16A single-phase power line filter meeting strict TEMPEST and military shielding demands.',
                'description' => 'The TGH-16 filter is designed to prevent conducted emissions and protect classified computing equipment in TEMPEST zones. Provides over 100 dB insertion loss from 10 kHz up to 10 GHz, with built-in surge protection and stainless steel sealed housing.',
                'specifications' => [
                    'Rated Current' => '16 A @ 40°C',
                    'Rated Voltage' => '250 VAC / 50-60 Hz',
                    'Insertion Loss' => '> 100 dB (10 kHz - 10 GHz)',
                    'Standards' => 'SDIP-27 Level A, MIL-STD-220C',
                    'Leakage Current' => '< 30 mA',
                    'Enclosure' => 'Corrosion-resistant electro-galvanized steel',
                ],
                'datasheet_path' => 'datasheets/sample_datasheet.pdf',
                'quote_email' => 'filters@emcdefence.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'category_slug' => 'filters',
                'name' => 'High Current 4-Phase Filter FL100E4',
                'model_number' => 'FL100E4',
                'short_description' => '100A three-phase plus neutral power line filter for shielded enclosures, server rooms and test facilities.',
                'description' => 'Designed for shielded enclosure entries, delivering guaranteed 100 dB attenuation across the 14 kHz to 40 GHz frequency band. Certified for continuous industrial duty with high transient overload resilience.',
                'specifications' => [
                    'Rated Current' => '100 A per phase',
                    'Voltage' => '440 VAC 3-Phase + Neutral',
                    'Attenuation' => '> 100 dB from 14 kHz to 40 GHz',
                    'Operating Temp' => '-40°C to +85°C',
                    'Weight' => '18.5 kg',
                ],
                'datasheet_path' => 'datasheets/sample_datasheet.pdf',
                'quote_email' => 'filters@emcdefence.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'category_slug' => 'filters',
                'name' => 'USB Data Feedthrough Filter USB10X',
                'model_number' => 'USB10X',
                'short_description' => 'Shielded room feedthrough USB 2.0/3.0 data line filter with high RF isolation.',
                'description' => 'Provides secure data communication through shielded cabin walls without compromising electromagnetic shielding integrity. Integrated transient voltage suppression and high-frequency ferrite suppression arrays.',
                'specifications' => [
                    'Protocols' => 'USB 2.0 / USB 3.0 compatible',
                    'Data Rate' => 'Up to 480 Mbps / 5 Gbps',
                    'Shielding Effectiveness' => '> 90 dB up to 10 GHz',
                    'Connector Type' => 'Type-A female on both sides',
                    'Mounting' => 'Bulkhead threaded collar',
                ],
                'datasheet_path' => 'datasheets/sample_datasheet.pdf',
                'quote_email' => 'filters@emcdefence.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],

            // ── 3. CHAMBERS ──
            [
                'category_slug' => 'chambers',
                'name' => '3M Semi-Anechoic Chamber (YYO3M)',
                'model_number' => 'YYO-3M',
                'short_description' => 'Full compliance 3-meter semi-anechoic chamber for commercial, automotive and defense EMC measurements.',
                'description' => 'Turnkey semi-anechoic test chamber designed for emissions and radiated immunity testing in accordance with CISPR 16-1-4, ANSI C63.4, and MIL-STD-461. Features modular pan-type pan-type shielding panels, precision ferrite tiles, and hybrid foam absorbers.',
                'specifications' => [
                    'Shielding Effectiveness' => '> 100 dB (10 kHz - 18 GHz)',
                    'NSA Performance' => 'Within ±3.5 dB (30 MHz - 1 GHz)',
                    'Quiet Zone' => '1.5 m diameter, 1.5 m height',
                    'Internal Dimensions' => '9.2 m (L) x 6.5 m (W) x 6.1 m (H)',
                    'Door Type' => 'Pneumatic RF knife-edge sliding door',
                ],
                'datasheet_path' => 'datasheets/sample_datasheet.pdf',
                'quote_email' => 'chambers@emcdefence.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'category_slug' => 'chambers',
                'name' => 'RF Shielded Enclosure Box EK454545',
                'model_number' => 'EK-454545',
                'short_description' => 'Benchtop RF shielded box for wireless DUT testing, IoT devices, radar modules and mobile communications.',
                'description' => 'Compact, portable RF isolation box constructed with thick machined aluminum alloy and double beryllium copper finger stock gaskets. Equipped with customizable I/O filtered bulkhead plates for power, USB, SMA, and Ethernet connections.',
                'specifications' => [
                    'Internal Dimensions' => '450 mm x 450 mm x 450 mm',
                    'Shielding Level' => '> 95 dB (500 MHz - 6 GHz)',
                    'Absorber Lining' => 'Pyramidal RF absorber (reflection loss > 15 dB)',
                    'I/O Ports' => '2x SMA, 2x N-Type, 1x USB 3.0 filtered, 1x AC Power',
                    'Locking Mechanism' => 'Dual pneumatic / heavy toggle clamp',
                ],
                'datasheet_path' => 'datasheets/sample_datasheet.pdf',
                'quote_email' => 'chambers@emcdefence.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],

            // ── 4. RF ABSORBERS ──
            [
                'category_slug' => 'rf-absorbers',
                'name' => 'Polyurethane Pyramidal Absorber THP-300',
                'model_number' => 'THP-300',
                'short_description' => 'High performance broadband pyramidal microwave absorber for anechoic chambers operating up to 40 GHz.',
                'description' => 'Manufactured from open-cell polyurethane foam impregnated with carbon dispersion. Conforms to NRL Report 8093 flammability resistance standards. Optimized geometric tip design minimizes reflections across oblique incidence angles.',
                'specifications' => [
                    'Pyramid Height' => '300 mm (11.8 inches)',
                    'Base Size' => '600 mm x 600 mm',
                    'Reflectivity' => '> -35 dB @ 1 GHz, > -45 dB @ 10 GHz',
                    'Power Handling' => 'Up to 1.5 kW/m² CW',
                    'Fire Retardancy' => 'NRL 8093 Tests 1, 2 & 3, ISO 11925-2',
                ],
                'datasheet_path' => 'datasheets/sample_datasheet.pdf',
                'quote_email' => 'sales@emcdefence.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'category_slug' => 'rf-absorbers',
                'name' => 'Sub-Terahertz Microwave Absorber STH-50',
                'model_number' => 'STH-50',
                'short_description' => 'Millimeter wave and sub-THz broadband absorber for 30 GHz to 300 GHz radar and 6G communications.',
                'description' => 'Engineered for high-frequency defense applications, automotive radar test benches, and millimeter-wave chamber linings. Exceptional durability and cleanroom environmental stability.',
                'specifications' => [
                    'Frequency Band' => '30 GHz to 300 GHz',
                    'Attenuation' => '> 30 dB across band',
                    'Material' => 'Loaded polymer matrix',
                    'Thickness' => '50 mm',
                    'Operating Temp' => '-50°C to +120°C',
                ],
                'datasheet_path' => 'datasheets/sample_datasheet.pdf',
                'quote_email' => 'sales@emcdefence.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],

            // ── 5. ANTENNAS ──
            [
                'category_slug' => 'antennas',
                'name' => 'Double Ridge Horn Antenna DRH-118',
                'model_number' => 'DRH-118',
                'short_description' => '1 GHz to 18 GHz high-gain directional horn antenna for radiated emissions and immunity testing.',
                'description' => 'Precision calibrated double-ridged guide horn antenna designed for high power handling and flat VSWR. Ideal for MIL-STD-461, DO-160, and CISPR compliance test setups.',
                'specifications' => [
                    'Frequency Range' => '1 GHz to 18 GHz',
                    'Gain' => '6 dBi to 15 dBi',
                    'Input Power' => '300 W CW / 500 W Peak',
                    'Connector' => 'Precision N-type Female (50 Ohm)',
                    'VSWR' => '< 1.5:1 average',
                ],
                'datasheet_path' => 'datasheets/sample_datasheet.pdf',
                'quote_email' => 'antennas@emcdefence.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'category_slug' => 'antennas',
                'name' => 'Biconical Broadband Antenna BCO-30300',
                'model_number' => 'BCO-30300',
                'short_description' => 'Rugged 30 MHz to 300 MHz biconical antenna for military and commercial EMC testing.',
                'description' => 'Constructed with lightweight aluminum elements and balanced balun transformer. Conforms with ANSI C63.5, SAE, and MIL-STD-461 RE102/RS103 standards.',
                'specifications' => [
                    'Frequency Range' => '30 MHz to 300 MHz',
                    'Impedance' => '50 Ohm',
                    'Max Input Power' => '100 W CW',
                    'Balun Type' => 'Broadband 1:1 ferrite balun',
                ],
                'datasheet_path' => 'datasheets/sample_datasheet.pdf',
                'quote_email' => 'antennas@emcdefence.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],

            // ── 6. LISN ──
            [
                'category_slug' => 'lisn',
                'name' => 'Line Impedance Stabilization Network LS032A2',
                'model_number' => 'LS032A2',
                'short_description' => 'Two-line 32A V-Network LISN (9 kHz - 30 MHz) complying with CISPR 16-1-2 and EN 55032.',
                'description' => 'Provides defined impedance for conducted emission measurements on single-phase AC equipment. Features built-in switchable 10 dB attenuator, artificial hand simulation, and high voltage surge protector.',
                'specifications' => [
                    'Frequency Range' => '9 kHz to 30 MHz',
                    'Continuous Current' => '32 A',
                    'Rated Voltage' => '250 VAC / 350 VDC',
                    'Network Circuit' => '50 μH + 5 Ω || 50 Ω (CISPR 16-1-2)',
                    'Phase Switch' => 'Manual / Remote USB selection',
                ],
                'datasheet_path' => 'datasheets/sample_datasheet.pdf',
                'quote_email' => 'emc@emcdefence.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'category_slug' => 'lisn',
                'name' => 'High Current Automotive & Defense LISN LS200A1',
                'model_number' => 'LS200A1',
                'short_description' => '200A single-line LISN for military vehicles and high-power electronics test per MIL-STD-461.',
                'description' => 'Engineered for testing high-current DC and AC systems under harsh continuous load conditions. Extremely low internal resistance prevents voltage drops at peak power.',
                'specifications' => [
                    'Max Current' => '200 A continuous, 300 A peak',
                    'Impedance' => '50 μH / 50 Ω (MIL-STD-461 & CISPR 25)',
                    'Frequency Band' => '10 kHz to 100 MHz',
                    'Dimensions' => '350 x 280 x 220 mm',
                ],
                'datasheet_path' => 'datasheets/sample_datasheet.pdf',
                'quote_email' => 'emc@emcdefence.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],

            // ── 7. CDN ──
            [
                'category_slug' => 'cdn',
                'name' => 'Coupling Decoupling Network CDN-M2/M3',
                'model_number' => 'CDN-M2-M3',
                'short_description' => 'Conducted immunity CDN for unscreened AC/DC mains supply cables per IEC/EN 61000-4-6.',
                'description' => 'Calibrated for tests up to 80 MHz (and extended 230 MHz) with strict common-mode impedance compliance. Easily configurable for 2-wire or 3-wire mains supply lines.',
                'specifications' => [
                    'Standard' => 'IEC 61000-4-6 / CISPR 16-1-2',
                    'Frequency' => '150 kHz to 80 MHz (extended 230 MHz)',
                    'Max Current' => '16 A / 250 VAC',
                    'Common Mode Impedance' => '150 Ω ± 20 Ω',
                ],
                'datasheet_path' => 'datasheets/sample_datasheet.pdf',
                'quote_email' => 'emc@emcdefence.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 1,
            ],

            // ── 8. TEST EQUIPMENT ──
            [
                'category_slug' => 'test-equipment',
                'name' => 'Broadband Transient Limiter TL-01',
                'model_number' => 'TL-01',
                'short_description' => '9 kHz to 200 MHz transient pulse protector with 10 dB flat attenuation for receiver front-ends.',
                'description' => 'Protects spectrum analyzer and EMI test receiver inputs from destructive high-voltage spikes produced by power line switching transients or LISN power-up pulses.',
                'specifications' => [
                    'Frequency Range' => '9 kHz to 200 MHz',
                    'Insertion Loss' => '10 dB (±0.5 dB flat)',
                    'Max Input Level' => '+33 dBm (2 Watt CW)',
                    'Pulse Clamping' => 'Clamps transients > 10V within 1 ns',
                    'Connectors' => 'N-Male to N-Female 50 Ohm',
                ],
                'datasheet_path' => 'datasheets/sample_datasheet.pdf',
                'quote_email' => 'instruments@emcdefence.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'category_slug' => 'test-equipment',
                'name' => 'Bulk Current Injection Probe CIP-100',
                'model_number' => 'CIP-100',
                'short_description' => 'High power BCI injection probe for MIL-STD-461 CS114 and automotive ISO 11452-4 testing.',
                'description' => 'Clamping toroidal injection transformer with high saturation threshold. Enables non-intrusive RF current coupling directly into wire harnesses.',
                'specifications' => [
                    'Frequency Range' => '10 kHz to 400 MHz',
                    'Max Input Power' => '200 W CW continuous',
                    'Aperture Diameter' => '40 mm (fits heavy cable bundles)',
                    'Core Type' => 'Low loss precision ferrite',
                ],
                'datasheet_path' => 'datasheets/sample_datasheet.pdf',
                'quote_email' => 'instruments@emcdefence.com',
                'is_used_equipment' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],

            // ── 9. USED EQUIPMENT ──
            [
                'category_slug' => 'used-equipment',
                'name' => 'Rohde & Schwarz ESCI EMI Test Receiver (Pre-Owned)',
                'model_number' => 'R&S ESCI-3',
                'short_description' => 'Certified pre-owned 9 kHz - 3 GHz compliance receiver with preselection and spectrum analyzer mode.',
                'description' => 'Fully refurbished and calibrated in our laboratory. Includes all CISPR detectors (Peak, Quasi-Peak, Average, CISPR-Average, RMS-Average) and Windows interface.',
                'specifications' => [
                    'Frequency Range' => '9 kHz to 3.0 GHz',
                    'Condition' => 'Grade A Refurbished, Calibrated',
                    'Warranty' => '6 Months Warranty Included',
                    'Noise Figure' => 'Typical 7 dB with preamplifier',
                    'Included' => 'Power cord, calibration certificate, user manual',
                ],
                'datasheet_path' => 'datasheets/sample_datasheet.pdf',
                'quote_email' => 'sales@emcdefence.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'category_slug' => 'used-equipment',
                'name' => 'HP 8594E RF Spectrum Analyzer (Pre-Owned)',
                'model_number' => 'HP 8594E',
                'short_description' => '9 kHz to 2.9 GHz portable spectrum analyzer with tracking generator option.',
                'description' => 'Reliable laboratory grade spectrum analyzer. Excellent for pre-compliance testing and RF debugging. Inspected and aligned to factory specifications.',
                'specifications' => [
                    'Frequency Range' => '9 kHz to 2.9 GHz',
                    'Resolution Bandwidth' => '1 kHz to 3 MHz',
                    'Dynamic Range' => '-120 dBm to +30 dBm',
                    'Condition' => 'Fully operational, cosmetic wear',
                ],
                'datasheet_path' => 'datasheets/sample_datasheet.pdf',
                'quote_email' => 'sales@emcdefence.com',
                'is_used_equipment' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
        ];

        $categoryImages = [
            'marx-generator' => 'products/marx_generator.svg',
            'filters' => 'products/power_filter.svg',
            'chambers' => 'products/rf_chamber.svg',
            'rf-absorbers' => 'products/rf_absorber.svg',
            'antennas' => 'products/horn_antenna.svg',
            'lisn' => 'products/lisn.svg',
            'cdn' => 'products/cdn.svg',
            'test-equipment' => 'products/test_equipment.svg',
            'used-equipment' => 'products/used_receiver.svg',
        ];

        foreach ($products as $p) {
            $cat = $categories->get($p['category_slug']);
            if (! $cat) {
                continue;
            }

            $imagePath = $p['image_path'] ?? ($categoryImages[$p['category_slug']] ?? null);

            Product::updateOrCreate(
                [
                    'category_id' => $cat->id,
                    'model_number' => $p['model_number'],
                ],
                [
                    'name' => $p['name'],
                    'short_description' => $p['short_description'],
                    'description' => $p['description'],
                    'specifications' => $p['specifications'],
                    'datasheet_path' => $p['datasheet_path'],
                    'image_path' => $imagePath,
                    'quote_email' => $p['quote_email'],
                    'is_used_equipment' => $p['is_used_equipment'],
                    'is_active' => $p['is_active'],
                    'sort_order' => $p['sort_order'],
                ]
            );
        }
    }
}
