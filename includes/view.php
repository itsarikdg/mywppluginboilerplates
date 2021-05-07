<div>
  <h2>This is my view</h2>
  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas, assumenda! Tempora tenetur voluptates minus ratione
    maiores, facere possimus excepturi sed.</p>

  <?php if ( $data ) : ?>
  <?php foreach( $data as $D ): ?>
  <?php include plugin_dir_path( __FILE__ ) . "component/component.php"; ?>
  <?php endforeach; ?>

  <?php endif; ?>

</div>