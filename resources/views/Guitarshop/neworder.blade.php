
<form method="POST"    action="{{ route('new_order',['alias' => 'tovar1']) }}" enctype="multipart/form-data">
    @csrf
    <input name="name" type="text"  value="{{ old('name') }}" required autofocus>
    <input name="email" type="text"  value="{{ old('name') }}" required autofocus>
    <input name="address" type="text"  value="{{ old('name') }}" required autofocus>
    <textarea name="_content"  rows="10" >{{ old('_content') }}</textarea>
    <button  type="submit" class="btn btn-primary"></button>
</form>

{{--
$table->string('product_id');
$table->string('guest_id');
$table->text('content');
$table->enum('satatus', ['0', '2']);


$table->string('name');
$table->string('email');
$table->text('address');--}}
