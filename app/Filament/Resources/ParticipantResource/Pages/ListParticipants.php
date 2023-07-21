<?php

namespace App\Filament\Resources\ParticipantResource\Pages;

use App\Filament\Resources\ParticipantResource;
use App\Models\Participant;
use Closure;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;

class ListParticipants extends ListRecords
{
    protected static string $resource = ParticipantResource::class;

    protected function getActions(): array
    {
        return [
        ];
    }

    protected function getTitle(): string
    {
        return "Participantes";
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return null;
    }
}
