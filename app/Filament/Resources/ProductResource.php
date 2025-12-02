<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Components\Tab;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Товары';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Общее')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Название')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('description')
                                    ->label('Описание')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Grid::make()->schema([
                                    Forms\Components\ColorPicker::make('gradient_from')
                                        ->label('Градиент от')
                                        ->required(),
                                    Forms\Components\ColorPicker::make('gradient_to')
                                        ->label('Градиент до')
                                        ->required(),
                                ])->columns(2),
                            ]),
                        Tabs\Tab::make('Медиа')
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('cover')
                                    ->label('Обложка Desktop')
                                    ->disk('media')
                                    ->collection('cover'),
                                SpatieMediaLibraryFileUpload::make('cover_mobile')
                                    ->label('Обложка Mobile')
                                    ->disk('media')
                                    ->collection('cover_mobile'),
                                SpatieMediaLibraryFileUpload::make('props')
                                    ->label('Преимущества')
                                    ->multiple()
                                    ->panelLayout('grid')
                                    ->disk('media')
                                    ->collection('props'),
                            ])->columns(2),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Название')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Создан')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
