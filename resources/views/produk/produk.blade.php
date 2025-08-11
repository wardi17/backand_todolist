<h2>Daftar Produk :</h2>
<ul>
    @foreach($produk as $item)
    <li>{{$item}}</li>
    $endforeach
</ul>

<!-- contoh  @if -->
@if(@stok > 0)
<p>Stok tersedia</p>
@else
<p>Stok habis</p>
@andif
