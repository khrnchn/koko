<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Filament\Resources\StudentResource\RelationManagers\AchievementsRelationManager;
use App\Models\Club;
use App\Models\Sport;
use App\Models\Student;
use App\Models\Uniform;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'User Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('General')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        Toggle::make('status')
                        ->label('Active')
                        ->inline(false),
                    ])->columns(2),

                Section::make('Co-curricular')
                    ->schema([
                        Select::make('uniform_id')
                            ->label('Uniform')
                            ->options(Uniform::all()->pluck('name', 'id'))
                            ->searchable(),

                        Select::make('club_id')
                            ->label('Club')
                            ->options(Club::all()->pluck('name', 'id'))
                            ->searchable(),

                        Select::make('sport_id')
                            ->label('Sport')
                            ->options(Sport::all()->pluck('name', 'id'))
                            ->searchable(),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('uniform.name'),
                Tables\Columns\TextColumn::make('club.name'),
                Tables\Columns\TextColumn::make('sport.name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            AchievementsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
