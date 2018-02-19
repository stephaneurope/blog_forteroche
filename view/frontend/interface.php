<div class="news">
    <h2>Tableau de Bord</h2>
    <?php while ($data = $posts->fetch())
{
?>
        <p style='margin-bottom:0;'><strong><?= $data['chapter'] ?>
      
    <p>
        <?= $data['title']?>
    </p>
        
        <?php
}