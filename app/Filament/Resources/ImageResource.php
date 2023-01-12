<?php

namespace App\Filament\Resources;

use App\Enums\ImageTypeEnum;
use App\Filament\Resources\ImageResource\Pages;
use App\Filament\Resources\ImageResource\RelationManagers;
use App\Models\Image;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use PgSql\Lob;

class ImageResource extends Resource
{
    protected static ?string $model = Image::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('name')
                    ->required()
                    ->options(function (Component $livewire, $record) {
                        $displayOptions = [];
                        $options = ImageTypeEnum::options();

                        if (! $livewire instanceof Pages\CreateImage) {
                            $displayOptions[$record->slug] = $record->slug;
                        }

                        $names = Image::all()->pluck('name');
                        foreach ($options as $optionKey => $option) {
                            if (! $livewire instanceof Pages\CreateImage) {
                                if (! $names->contains($optionKey) || $record->name == $optionKey) {
                                    $displayOptions[$optionKey] = $option;
                                }
                            } else {
                                if (! $names->contains($optionKey)) {
                                    $displayOptions[$optionKey] = $option;
                                }
                            }
                        }

                        return $displayOptions;
                    })
                    ->label('Name'),
                SpatieMediaLibraryFileUpload::make('image'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListImages::route('/'),
            'create' => Pages\CreateImage::route('/create'),
            'view' => Pages\ViewImage::route('/{record}'),
            'edit' => Pages\EditImage::route('/{record}/edit'),
        ];
    }    
}
