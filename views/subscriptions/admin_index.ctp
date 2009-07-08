<? if(!empty($errors)) { ?>
      <p><?php echo __('The following errors ocourred during import:', true) ?></p>
      <ul>
        <? foreach($errors as $error) { ?>
          <li><?php echo $error ?></li>
        <? } ?>
      </ul>
<? } ?>

<?php $paginator->url(array('admin' => true)); ?>

<ul class="actions">
  <li><?php echo $html->link(__('Add subscription', true), '/admin/newsletter/subscriptions/add', array('class' => 'button add')); ?></li>
</ul>

<?php echo $form->create('Subscription', array('url' => '/admin/newsletter/subscriptions/import_csv', 'type' => 'file')) ?>
  <p><?php echo __("Import a CSV file (must be in the format: 'user@email.com, User Name', without quotes).", true) ?></p>
  <p><?php echo __("This can take a while if there are many registries, so please be patient.", true) ?></p>
  <?php echo $form->file('csv', array('size' => '40'))?>
  <?php echo $form->input('Group', array('selected' => $siteGroup)) ?>
<?php echo $form->end(__('Import', true)) ?>

<?php echo $form->create('Filter', array('url' => '/admin/newsletter/subscriptions/index' ) ); ?>
<?php echo $form->input('Filter.value', array('label' => __('Filter', true))); ?>
<?php echo $form->end(__( 'Filter', true)); ?>

<div class="block">
    <h3><span><?php __( 'View subscriptions'); ?></span></h3>
    <table cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $paginator->sort(__( 'Email', true), 'email'); ?></th>
                <th><?php echo $paginator->sort(__( 'Name', true), 'name'); ?></th>
                <th><?php echo $paginator->sort(__( 'Opt-Out', true), 'opt_out_date'); ?></th>
                <th><?php echo $paginator->sort(__( 'Created on', true), 'created'); ?></th>
	              <th><?php echo $paginator->sort(__( 'Modified on', true), 'modified'); ?></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php $i = 0; foreach($subscriptions as $subscription) : ?>
            <tr<?php echo is_int($i / 2) ? ' class="alt"' : ''; ?>>
                <td><?php echo $html->link($subscription['Subscription']['email'], array('action' => 'edit', 'admin' => true, $subscription['Subscription']['id'])); ?></td>
                <td><?php echo $subscription['Subscription']['name']; ?></td>
                <td id="td_opt_out_<?php echo $subscription['Subscription']['id'] ?>">
                  <?php if(!$subscription['Subscription']['opt_out_date']) { ?>
                    <?php echo __('Yes') ?>
                  <?php } else { ?>
                    <?php echo __('No, at ') . $subscription['Subscription']['opt_out_date'] ?>
                  <?php } ?>
                  <a href="#" onclick="changeOptOut(<?php echo $subscription['Subscription']['id'] ?>);"><?php echo ($subscription['Subscription']['opt_out_date'] ? __( '(unset)', true) : __( '(set)', true)) ?></a> 
                </td>
                <td><?php echo $time->niceShort($subscription['Subscription']['created']); ?></td>
	              <td><?php echo $time->niceShort($subscription['Subscription']['modified']); ?></td>
                <td><?php echo $html->link(__( 'Delete', true), array('action' => 'delete', 'admin' => true, $subscription['Subscription']['id'])); ?></td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>

<?php echo $this->renderElement('admin_pagination'); ?>

<script>
  function changeOptOut(id) {
    var td = jQuery('#td_opt_out_'+id);
    var url = "<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/admin/newsletter/subscriptions/invert_opt_out/'?>"+id;
    td.load(url);
  }
</script>
