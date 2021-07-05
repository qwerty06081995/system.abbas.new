<?php
/**
 * Migration genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Dwij\Laraadmin\Models\Module;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Module::generate("Orders", 'orders', 'overhead_id', 'fa-phone-square', [
            ["order_code", "Код", "String", true, "", 0, 256, false],
            ["from_name", "Отправитель", "Name", false, "", 0, 256, false],
            ["from_company", "Компания", "String", false, "", 0, 256, false],
            ["from_city", "Город", "String", false, "", 0, 256, false],
            ["from_address", "Адрес", "Address", false, "", 0, 256, false],
            ["to_name", "Получатель", "Name", false, "", 0, 256, false],
            ["to_company", "Компания", "String", false, "", 0, 256, false],
            ["to_city", "Город", "String", false, "", 0, 256, false],
            ["to_address", "Адрес", "Address", false, "", 0, 256, false],
            ["to_phone", "Телефон", "Mobile", false, "", 0, 20, false],
            ["from_phone", "Телефон", "Mobile", false, "", 0, 20, false],
            ["date_s", "Дата создания", "Datetime", false, "", 0, 0, false],
            ["date_e", "Дата завершения", "Datetime", false, "", 0, 0, false],
            ["type", "Тип отправления", "Radio", false, "", 0, 0, false, ["\u0414\u043e\u043a\u0443\u043c\u0435\u043d\u0442\u044b","\u041f\u043e\u0441\u044b\u043b\u043a\u0430"]],
            ["speed", "Скорость", "Radio", false, "", 0, 0, false, ["\u042d\u043a\u0441\u043f\u0440\u0435\u0441\u0441","\u0421\u0442\u0430\u043d\u0434\u0430\u0440\u0442","\u0410\u0432\u0442\u043e"]],
            ["payment", "Оплата", "Radio", false, "", 0, 0, false, ["\u041e\u0442\u043f\u0440\u0430\u0432\u0438\u0442\u0435\u043b\u0435\u043c","\u041f\u043e\u043b\u0443\u0447\u0430\u0442\u0435\u043b\u0435\u043c","\u0422\u0440\u0435\u0442\u044c\u0435\u0439 \u0441\u0442\u043e\u0440\u043e\u043d\u043e\u0439"]],
            ["payment_type", "Способ оплаты", "Radio", false, "", 0, 0, false, ["\u041f\u043e \u0441\u0447\u0435\u0442\u0443","\u041d\u0430\u043b\u0438\u0447\u043d\u044b\u043c\u0438","\u0422\u0435\u0440\u043c\u0438\u043d\u0430\u043b\u043e\u043c"]],
            ["comment", "Примечание", "Textarea", false, "", 0, 0, false],
            ["status", "Статус", "Radio", false, "", 0, 0, false, ["\u0412 \u043f\u0440\u043e\u0446\u0435\u0441\u0441\u0435","\u0412\u044b\u043f\u043e\u043b\u043d\u0435\u043d","\u0412 \u043f\u0443\u0442\u0438","\u041a\u0443\u0440\u044c\u0435\u0440 \u0437\u0430\u0431\u0440\u0430\u043b"]],
            ["courier_id", "Курьер", "Integer", false, "0", 0, 11, false],
            ["overhead_id", "Накладной", "Integer", false, "", 0, 11, false],
        ]);
		
		/*
		Row Format:
		["field_name_db", "Label", "UI Type", "Unique", "Default_Value", "min_length", "max_length", "Required", "Pop_values"]
        Module::generate("Module_Name", "Table_Name", "view_column_name" "Fields_Array");
        
		Module::generate("Books", 'books', 'name', [
            ["address",     "Address",      "Address",  false, "",          0,  1000,   true],
            ["restricted",  "Restricted",   "Checkbox", false, false,       0,  0,      false],
            ["price",       "Price",        "Currency", false, 0.0,         0,  0,      true],
            ["date_release", "Date of Release", "Date", false, "date('Y-m-d')", 0, 0,   false],
            ["time_started", "Start Time",  "Datetime", false, "date('Y-m-d H:i:s')", 0, 0, false],
            ["weight",      "Weight",       "Decimal",  false, 0.0,         0,  20,     true],
            ["publisher",   "Publisher",    "Dropdown", false, "Marvel",    0,  0,      false, ["Bloomsbury","Marvel","Universal"]],
            ["publisher",   "Publisher",    "Dropdown", false, 3,           0,  0,      false, "@publishers"],
            ["email",       "Email",        "Email",    false, "",          0,  0,      false],
            ["file",        "File",         "File",     false, "",          0,  1,      false],
            ["files",       "Files",        "Files",    false, "",          0,  10,     false],
            ["weight",      "Weight",       "Float",    false, 0.0,         0,  20.00,  true],
            ["biography",   "Biography",    "HTML",     false, "<p>This is description</p>", 0, 0, true],
            ["profile_image", "Profile Image", "Image", false, "img_path.jpg", 0, 250,  false],
            ["pages",       "Pages",        "Integer",  false, 0,           0,  5000,   false],
            ["mobile",      "Mobile",       "Mobile",   false, "+91  8888888888", 0, 20,false],
            ["media_type",  "Media Type",   "Multiselect", false, ["Audiobook"], 0, 0,  false, ["Print","Audiobook","E-book"]],
            ["media_type",  "Media Type",   "Multiselect", false, [2,3],    0,  0,      false, "@media_types"],
            ["name",        "Name",         "Name",     false, "John Doe",  5,  250,    true],
            ["password",    "Password",     "Password", false, "",          6,  250,    true],
            ["status",      "Status",       "Radio",    false, "Published", 0,  0,      false, ["Draft","Published","Unpublished"]],
            ["author",      "Author",       "String",   false, "JRR Tolkien", 0, 250,   true],
            ["genre",       "Genre",        "Taginput", false, ["Fantacy","Adventure"], 0, 0, false],
            ["description", "Description",  "Textarea", false, "",          0,  1000,   false],
            ["short_intro", "Introduction", "TextField",false, "",          5,  250,    true],
            ["website",     "Website",      "URL",      false, "http://dwij.in", 0, 0,  false],
        ]);
		*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('orders')) {
            Schema::drop('orders');
        }
    }
}
