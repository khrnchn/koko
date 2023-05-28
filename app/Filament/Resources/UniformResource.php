<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UniformResource\Pages;
use App\Filament\Resources\UniformResource\RelationManagers;
use App\Models\Uniform;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UniformResource extends Resource
{
    protected static ?string $model = Uniform::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static ?string $navigationGroup = 'Co-curriculum';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Select::make('user_id')
                    ->label('Person In Charge')
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('user_id')
                    ->label('Person In Charge')
                    ->formatStateUsing(fn ($state): ?string => User::find($state)?->name ?? null),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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
            ActivitiesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUniforms::route('/'),
            'create' => Pages\CreateUniform::route('/create'),
            'edit' => Pages\EditUniform::route('/{record}/edit'),
            'view' => Pages\ViewUniform::route('/{record}/view'),
        ];
    }
}
