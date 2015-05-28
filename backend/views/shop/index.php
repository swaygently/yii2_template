<?php
use yii\widgets\LinkPager;
use yii\widgets\LinkSorter;

use yii\grid\GridView;
?>

<?php
echo LinkSorter::widget([
   'sort' => $sort,
]);
?>

<?php foreach ($models as $model): ?>
    <?= $model->id ?>
<?php endforeach; ?>


<?php
// display pagination
echo LinkPager::widget([
    'pagination' => $pages,
]);
?>

<br />
<br />
<br />
<hr />
<br />


<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $model,
]);
?>
