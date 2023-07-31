<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParticipantResource\Pages;
use App\Filament\Widgets\StatsOverview;
use App\Models\Participant;
use Closure;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;

class ParticipantResource extends Resource
{
    protected static ?string $model = Participant::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nombre'),
                Tables\Columns\TextColumn::make('cellphone')->label('Celular'),
                Tables\Columns\IconColumn::make('confirmation')->label('Confirmación')
                    ->options([
                        'heroicon-o-check' => 'si',
                        'heroicon-o-x' => 'no',
                    ])
                    ->colors([
                        'success' => 'si',
                        'secondary' => 'no'
                    ]),
                Tables\Columns\TextColumn::make('message')->label('Mensaje'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de Registro')
                    ->dateTime('d-m-Y h:i A')
            ])
            ->filters([
                //
            ])
            ->headerActions([
                ExportAction::make()
                    ->label('Exportar')
            ])
            ->actions([
//                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
//                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListParticipants::route('/'),
            'edit' => Pages\EditParticipant::route('/{record}/edit'),
        ];
    }

    public static function getBreadcrumb(): string
    {
        return 'Participantes';
    }

    protected static function getNavigationLabel(): string
    {
        return "Participantes";
    }
}
