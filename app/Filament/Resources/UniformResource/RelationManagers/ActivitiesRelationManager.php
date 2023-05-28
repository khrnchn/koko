<?php

namespace App\Filament\Resources\UniformResource\RelationManagers;

use App\Models\Uniform;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActivitiesRelationManager extends RelationManager
{
    protected static string $relationship = 'activities';

    protected static ?string $recordTitleAttribute = 'name';

    public ?Model $record = null;

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Section::make('Activity Detail')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DateTimePicker::make('start_at')
                            ->required(),
                        Forms\Components\DateTimePicker::make('end_at')
                            ->required(),
                        Forms\Components\FileUpload::make('image_path'),
                        Forms\Components\TextInput::make('location_id')
                            ->required()
                            ->numeric(),
                    ])->columns(2),

                Section::make('Attendance')
                    ->schema(function ($component, ?Model $record) {

                        // ni hilangkan error, nanti kena betulkan balik
                        if ($record == null) {
                            $array = [];
                            return $array;
                        }

                        // Looping for all products
                        $students = Student::where('uniform_id', $record->uniform->id)->get();

                        $array = [];
                        foreach ($students as $index => $student) {
                            $array[] = Fieldset::make($student->name)
                                ->schema([
                                    Toggle::make('status')->label('Attend'),
                                ]);
                        }
                        return $array;
                    })
                // save attendance data into attendances table

                ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('start_at'),
                Tables\Columns\TextColumn::make('end_at'),
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
