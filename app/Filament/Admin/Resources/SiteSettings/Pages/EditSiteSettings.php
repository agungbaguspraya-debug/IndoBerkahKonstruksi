<?php

namespace App\Filament\Admin\Resources\SiteSettings\Pages;

use App\Filament\Admin\Resources\SiteSettings\SiteSettingResource;
use App\Models\SiteSetting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class EditSiteSettings extends Page
{
    protected static string $resource = SiteSettingResource::class;

    public string $view = 'filament.pages.edit-site-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = SiteSetting::all()->pluck('value', 'key')->toArray();
        $this->data = $settings;
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Tabs::make('Settings')
                    ->tabs([

                        Tabs\Tab::make('🏠 Hero Section')
                            ->schema([
                                Section::make('Judul Utama')
                                    ->schema([
                                        TextInput::make('hero_title_line1')->label('Baris 1 Judul'),
                                        TextInput::make('hero_title_line2')->label('Baris 2 Judul (italic)'),
                                        TextInput::make('hero_title_line3')->label('Baris 3 Judul'),
                                        Textarea::make('hero_subtitle')->label('Sub-judul')->rows(2)->columnSpanFull(),
                                        TextInput::make('hero_badge_title')->label('Badge Judul (kiri bawah)'),
                                        TextInput::make('hero_badge_subtitle')->label('Badge Sub-judul'),
                                    ])->columns(2),

                                Section::make('Gambar Hero')
                                    ->schema([
                                        FileUpload::make('hero_image')
                                            ->label('Gambar Hero Utama')
                                            ->image()
                                            ->directory('site-settings')
                                            ->visibility('public')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        Tabs\Tab::make('📖 About Section')
                            ->schema([
                                Section::make('Teks About')
                                    ->schema([
                                        TextInput::make('about_label')->label('Label Kecil (atas)'),
                                        TextInput::make('about_title_line1')->label('Judul Baris 1'),
                                        TextInput::make('about_title_line2')->label('Judul Baris 2 (tebal)'),
                                        TextInput::make('about_title_line3')->label('Judul Baris 3'),
                                        Textarea::make('about_description')->label('Deskripsi Paragraf')->rows(4)->columnSpanFull(),
                                    ])->columns(2),

                                Section::make('Gambar & Statistik')
                                    ->schema([
                                        FileUpload::make('about_image')
                                            ->label('Gambar About')
                                            ->image()
                                            ->directory('site-settings')
                                            ->visibility('public')
                                            ->columnSpanFull(),
                                        TextInput::make('about_experience')->label('Angka Pengalaman (mis: 10+)'),
                                        TextInput::make('about_experience_text')->label('Keterangan Pengalaman'),
                                    ])->columns(2),
                            ]),

                        Tabs\Tab::make('🔧 Layanan/Program')
                            ->schema([
                                Section::make('Judul Section')
                                    ->schema([
                                        TextInput::make('program_label')->label('Label Kecil'),
                                        TextInput::make('program_title')->label('Judul'),
                                        TextInput::make('program_title_bold')->label('Judul Tebal'),
                                    ])->columns(3),

                                Section::make('Card 1')
                                    ->schema([
                                        TextInput::make('layanan_1_title')->label('Judul'),
                                        TextInput::make('layanan_1_slug')->label('Slug URL'),
                                        Textarea::make('layanan_1_description')->label('Deskripsi')->rows(2)->columnSpanFull(),
                                        FileUpload::make('layanan_1_image')
                                            ->label('Gambar/Ikon')
                                            ->image()
                                            ->directory('site-settings/layanan')
                                            ->visibility('public')
                                            ->columnSpanFull(),
                                    ])->columns(2),

                                Section::make('Card 2')
                                    ->schema([
                                        TextInput::make('layanan_2_title')->label('Judul'),
                                        TextInput::make('layanan_2_slug')->label('Slug URL'),
                                        Textarea::make('layanan_2_description')->label('Deskripsi')->rows(2)->columnSpanFull(),
                                        FileUpload::make('layanan_2_image')
                                            ->label('Gambar/Ikon')
                                            ->image()
                                            ->directory('site-settings/layanan')
                                            ->visibility('public')
                                            ->columnSpanFull(),
                                    ])->columns(2),

                                Section::make('Card 3')
                                    ->schema([
                                        TextInput::make('layanan_3_title')->label('Judul'),
                                        TextInput::make('layanan_3_slug')->label('Slug URL'),
                                        Textarea::make('layanan_3_description')->label('Deskripsi')->rows(2)->columnSpanFull(),
                                        FileUpload::make('layanan_3_image')
                                            ->label('Gambar/Ikon')
                                            ->image()
                                            ->directory('site-settings/layanan')
                                            ->visibility('public')
                                            ->columnSpanFull(),
                                    ])->columns(2),

                                Section::make('Card 4')
                                    ->schema([
                                        TextInput::make('layanan_4_title')->label('Judul'),
                                        TextInput::make('layanan_4_slug')->label('Slug URL'),
                                        Textarea::make('layanan_4_description')->label('Deskripsi')->rows(2)->columnSpanFull(),
                                        FileUpload::make('layanan_4_image')
                                            ->label('Gambar/Ikon')
                                            ->image()
                                            ->directory('site-settings/layanan')
                                            ->visibility('public')
                                            ->columnSpanFull(),
                                    ])->columns(2),
                            ]),

                        Tabs\Tab::make('🦶 Footer')
                            ->schema([
                                Section::make('Teks Perusahaan')
                                    ->schema([
                                        Textarea::make('footer_company_text')->label('Deskripsi Perusahaan')->rows(2)->columnSpanFull(),
                                        TextInput::make('footer_tagline')->label('Tagline Bawah')->columnSpanFull(),
                                    ]),

                                Section::make('Label Kolom')
                                    ->schema([
                                        TextInput::make('footer_eksplorasi_label')->label('Label Kolom Eksplorasi'),
                                        TextInput::make('footer_keahlian_label')->label('Label Kolom Keahlian'),
                                        TextInput::make('footer_kontak_label')->label('Label Kolom Kontak'),
                                    ])->columns(3),

                                Section::make('Keahlian Kami')
                                    ->schema([
                                        TextInput::make('footer_keahlian_1')->label('Keahlian 1'),
                                        TextInput::make('footer_keahlian_2')->label('Keahlian 2'),
                                        TextInput::make('footer_keahlian_3')->label('Keahlian 3'),
                                        TextInput::make('footer_keahlian_4')->label('Keahlian 4'),
                                    ])->columns(2),

                                Section::make('Kontak & Sosial Media')
                                    ->schema([
                                        TextInput::make('footer_telepon')->label('Nomor Telepon'),
                                        TextInput::make('footer_email')->label('Email'),
                                        TextInput::make('footer_facebook')->label('Link Facebook'),
                                        TextInput::make('footer_instagram')->label('Link Instagram'),
                                    ])->columns(2),
                            ]),

                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString(),
            ]);
    }

    public function save(): void
    {
        $data = $this->data;

        foreach ($data as $key => $value) {
            if ($value !== null) {
                SiteSetting::set($key, is_array($value) ? ($value[0] ?? '') : (string) $value);
            }
        }

        Notification::make()
            ->title('Pengaturan berhasil disimpan!')
            ->success()
            ->send();
    }
}
