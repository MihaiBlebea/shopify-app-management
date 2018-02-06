<?php
/* Smarty version 3.1.32-dev-38, created on 2018-02-06 21:28:23
  from '/Users/mihaiblebea/Sites/shopify-app-management/views/templates/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a7a0fe73c7322_70733656',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ed7256070ca1a7cde4dfd466733f63071e30cf9' => 
    array (
      0 => '/Users/mihaiblebea/Sites/shopify-app-management/views/templates/home.tpl',
      1 => 1517835138,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a7a0fe73c7322_70733656 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13051520595a7a0fe73b9505_25301947', "body");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18631497935a7a0fe73c5789_87933943', "footer");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block "body"} */
class Block_13051520595a7a0fe73b9505_25301947 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_13051520595a7a0fe73b9505_25301947',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

            </div>
        </div>
    </div>
<?php
}
}
/* {/block "body"} */
/* {block "footer"} */
class Block_18631497935a7a0fe73c5789_87933943 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_18631497935a7a0fe73c5789_87933943',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php
}
}
/* {/block "footer"} */
}
