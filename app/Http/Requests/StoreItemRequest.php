<?php
...
class StoreItemRequest extends FormRequest {
public function authorize() {
return true;
}
public function rules() {
return [
'name'
=> 'required|string|max:255',
'quantity'
'price'
=> 'required|integer|min:0',
=> 'required|numeric|min:0',
'category_id' => 'required|exists:categories,id',
];
}
public function messages() {
return [
'name.required'
'quantity.integer'
'price.numeric'
=> 'Nama item wajib diisi.',
=> 'Jumlah harus angka bulat.',
=> 'Harga harus berupa angka.',
'category_id.exists' => 'Kategori tidak ditemukan.',
];
}
}