<div class="container">
  <div class="row">
    <div class="col-md-122">
      <blockquote>
        <h1 style="font-size:22px;"><?= $Lang->get("Changelogs"); ?></h1>
      </blockquote>

      <div class="row">

        <table class="table table-striped">
          <thead>
            <tr>
              <th><?= $Lang->get("TABLE_HEAD_LEVEL"); ?></th>
              <th><?= $Lang->get("TABLE_HEAD_DATE"); ?></th>
              <th><?= $Lang->get("TABLE_HEAD_AUTHOR"); ?></th>
              <th><?= $Lang->get("TABLE_HEAD_COMMENT"); ?></th>
            </tr>
          </thead>

          <tbody>
            <?php $id = 1; ?>
            <?php foreach($changelogs as $changlog){ ?>
            <tr>
              <td class="col-md-1" style="font-size:18px;">

              <?php
              $level = $changlog['Changelogs']['level'];
              if($level == 1){
                echo '<span class="label label-info" style="padding:8px;">INFORMATION</span>';
              }else if($level == 2){
                echo '<span class="label label-warning" style="padding:8px;">MISE À JOUR JEU</span>';
              }else if($level == 3){
                echo '<span class="label label-danger" style="padding:8px;">MISE À JOUR DISCORD</span>';
              }else{
                echo '<span class="label label-success" style="padding:8px;">MISE À JOUR SITE</span>';
              }
              ?>

              </td>
              <td class="col-md-2"><?= date("d-m-Y à H:i:s", strtotime($changlog['Changelogs']['created'])); ?></td>
              <td class="col-md-1"><?= $changlog['Changelogs']['author']; ?></td>
              <td class="col-md-9">
                <div class="btn-primary btn-changelog" id="<?= $id; ?>">
                  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
                  <center><i class="fas fa-eye"></i> Voir</center>
                </div>
                <div class="desc-changelog" id="<?= $id; ?>" style="display: none;">
                  <?= $changlog['Changelogs']['description']; ?>
                </div>
              </td>
            </tr>
            <?php $id++; ?>
            <?php } ?>
          </tbody>
        </table>
        <script type="text/javascript">
          $(function() {
            $(".btn-changelog").click(function(e){
              e.preventDefault();
              id = $(this).attr("id");
              $("#" + id + ".desc-changelog").slideToggle("slow");
            });
          });
        </script>
        </div>
    </div>
  </div>
</div>