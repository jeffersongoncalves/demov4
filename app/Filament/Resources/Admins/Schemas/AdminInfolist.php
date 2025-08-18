<?php

namespace App\Filament\Resources\Admins\Schemas;

use App\Filament\Schemas\Components\AdditionalInformation;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use JeffersonGoncalves\Filament\RatingField\Infolists\Components\RatingEntry;
use JeffersonGoncalves\Filament\RatingField\Tables\Columns\RatingColumn;
use Joaopaulolndev\FilamentPdfViewer\Infolists\Components\PdfViewerEntry;

class AdminInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make()
                    ->schema([
                        TextEntry::make('id'),
                        IconEntry::make('status')
                            ->boolean(),
                        TextEntry::make('name'),
                        TextEntry::make('email')
                            ->copyable()
                            ->copyMessage('Email copied successfully!')
                            ->copyMessageDuration(1500),
                        RatingEntry::make('rating'),
                        PdfViewerEntry::make('attachment')
                            ->label('View the PDF')
                            ->fileUrl(asset('/attachment/materiais.pdf'))
                            ->minHeight('40svh')
                            ->columnSpanFull(),
                    ]),
                AdditionalInformation::make([
                    'created_at',
                    'updated_at',
                ]),
            ]);
    }
}
