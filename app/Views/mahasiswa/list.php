<?= $this->extend('template')?>
<?= $this->section('content')?>

<a href="/create" type="button" class="btn btn-primary mb-3">Tambah</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NPM</th>
      <th scope="col">NAMA</th>
      <th scope="col">Alamat</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Created_At</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
      <?php $no = 1;  foreach($mahasiswa as $mhs) : ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $mhs ['npm'] ?></td>
      <td><?= $mhs ['nama'] ?></td>
      <td><?= $mhs ['deskripsi'] ?></td>
      <td><?= $mhs ['alamat'] ?></td>
      <td><?= $mhs ['created_at'] ?></td>
      
      
      <td>
        <form action="/delete/<?= $mhs['id'] ?>" method="post">
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger">Hapus</button>
        </form>

        <form action="/edit/<?= $mhs['id'] ?>" method="get">
          <input type="hidden" name="_method" value="UPDATE">
          <button type="submit" class="btn btn-warning">Edit</button>
        </form>
      </td>
      
    </tr>
    <?php $no++; 
    endforeach ?>
  </tbody>
</table>

<?= $this->endSection()?>