<?php
/* Smarty version 3.1.32-dev-38, created on 2018-02-05 14:22:57
  from '/Users/mihaiblebea/Sites/shopify-app/views/templates/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a785ab1bde9a0_99015997',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0f8b626c233ae6b82527b09647ca0f1f2a9bf2b' => 
    array (
      0 => '/Users/mihaiblebea/Sites/shopify-app/views/templates/home.tpl',
      1 => 1517835138,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a785ab1bde9a0_99015997 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10896048635a785ab1bd0388_88045275', "body");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3262877865a785ab1bdb201_17996992', "footer");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block "body"} */
class Block_10896048635a785ab1bd0388_88045275 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_10896048635a785ab1bd0388_88045275',
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
class Block_3262877865a785ab1bdb201_17996992 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_3262877865a785ab1bdb201_17996992',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php
}
}
/* {/block "footer"} */
}
