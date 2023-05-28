<?php

namespace App\Filament\Resources\StudentResource\RelationManagers;

use App\Models\Student;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AchievementsRelationManager extends RelationManager
{
    protected static string $relationship = 'achievements';

    protected static ?string $recordTitleAttribute = 'event';

    public ?Model $record = null;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('position')
                    ->options([
                        'chairman' => 'Chairman',
                        'vicechairman' => 'Vice Chairman',
                        'secretary' => 'Secretary',
                        'treasurer' => 'Treasurer',
                        'member' => 'Member',
                    ]),

                Forms\Components\TextInput::make('event')
                    ->required()
                    ->maxLength(255),

                Select::make('level')
                    ->options([
                        'internal' => 'Internal',
                        'disctrict' => 'District',
                        'state' => 'State',
                        'national' => 'National',
                        'international' => 'International',
                    ]),

                // query and get student's club/ uniform/ sport
                Forms\Components\TextInput::make('representing')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('achievement')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('event'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
