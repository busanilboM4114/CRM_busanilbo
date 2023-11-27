<?php
/* Smarty version 4.3.1, created on 2023-11-27 15:47:02
  from '/storage/web/funbusan/doctorQ/html/web-cs/550000_fix_board/_alist.tpl.htm' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_65643b66d6dc40_78163986',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d36dd2fbb48d668528176771c2e36c637fdead4' => 
    array (
      0 => '/storage/web/funbusan/doctorQ/html/web-cs/550000_fix_board/_alist.tpl.htm',
      1 => 1701065776,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65643b66d6dc40_78163986 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
function view_article(idx)
{
	location.href=document.getElementById(idx).href;
}

function del()
{
	var f = document.form1;
	var isChecked = false;
	var obj = document.getElementsByName("isDel[]");
	for(var i = 0 ; i < obj.length; i++)
	{
		if(document.getElementsByName('isDel[]')[i].checked==true)
		{
			isChecked=true;
			break;
		}
	}

	if(isChecked==false)
	{
		alert('삭제 대상을 선택하세요.');
		return;
	}
	else
	{
		if(confirm('선택한 대상을 삭제하시겠습니까?'))
		{
			f.modes.value = "alldel";
			f.submit();
		}
	}
}

// 전체선택/해제
function total_check(bool)
{
	var obj = document.getElementsByName("isDel[]");
	for (var i=0; i<obj.length; i++) obj[i].checked = bool;
}

function search_board()
{

}
<?php echo '</script'; ?>
>


<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3"><?php echo $_smarty_tpl->tpl_vars['etc']->value['board_title'];?>
</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<form action="<?php echo $_SERVER['PHP_SELF'];?>
" method="get" name="searchform" id="searchform" class="p0 m0">
							<input type="hidden" name="menu" value="<?php echo $_smarty_tpl->tpl_vars['etc']->value['menu'];?>
">
							<input type="hidden" name="tn" value="<?php echo $_smarty_tpl->tpl_vars['etc']->value['tn'];?>
">

							<div class="row">
								<div class="col-4 col-md-4">
									<div class="input-group">
										<select name="search_select" id="search_select" class="form-select">
											<option value="title"<?php if ($_smarty_tpl->tpl_vars['etc']->value['search_select'] == 'title') {?> selected="selected"<?php }?>>제목</option>
											<option value="contents"<?php if ($_smarty_tpl->tpl_vars['etc']->value['search_select'] == 'contents') {?> selected="selected"<?php }?>>내용</option>
											<option value="all"<?php if ($_smarty_tpl->tpl_vars['etc']->value['search_select'] == 'all') {?> selected="selected"<?php }?>>제목+내용</option>
										</select>
										<input name="keyword" id="keyword" type="text" class="form-control" title="키워드" value="<?php echo $_smarty_tpl->tpl_vars['etc']->value['keyword'];?>
" alt="키워드" />
										<button class="btn btn-secondary" type="submit"><i class="align-middle white" data-feather="search"></i> 검색</button>
									</div>
								</div>
								<div class="col-8 col-md-8 tar">
									<div class="input-group">
										<select id="board_idx" name="board_idx" class="form-select">
											<option value="">전체</option>
											<?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['board_config']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['board_config']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['idx'];?>
"<?php if ($_smarty_tpl->tpl_vars['etc']->value['board_idx'] == $_smarty_tpl->tpl_vars['board_config']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['idx']) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['board_config']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['title'];?>
</option>
											<?php
}
}
?>
										</select>
										<button class="btn btn-secondary" type="button" onclick="search_board()"><i class="align-middle white" data-feather="search"></i> 게시판찾기</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<table class="table table-striped">
							<colgroup>
								<col />
								<col />
								<col />
								<col />
								<col />
								<col />
								<col />
								<col />
								<col />
							</colgroup>
							<thead>
								<tr>
									<th class="tac"><input type="checkbox" onclick="total_check(this.checked);" name="allcheck" value="checkbox" /></th>
									<th class="tac">번호</th>
									<th class="tac">게시판</th>
									<th class="tac">제목</th>
									<th class="tac">작성자</th>
									<th class="tac">작성일</th>
								</tr>
							</thead>
							<?php
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['L']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total !== 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
							<tr>
								<td class="tac"><input type="checkbox" name="isDel[]" value="<?php echo $_smarty_tpl->tpl_vars['L']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['idx'];?>
" /></td>
								<td class="hand tac" onclick="view_article('article_<?php echo $_smarty_tpl->tpl_vars['L']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['idx'];?>
')"><strong><?php echo $_smarty_tpl->tpl_vars['L']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['no'];?>
</strong><a href="?menu=<?php echo $_smarty_tpl->tpl_vars['etc']->value['menu'];?>
&mode=read&idx=<?php echo $_smarty_tpl->tpl_vars['L']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['idx'];?>
&tn=<?php echo $_smarty_tpl->tpl_vars['etc']->value['tn'];?>
&pagenum=<?php echo $_smarty_tpl->tpl_vars['etc']->value['pagenum'];?>
&search_select=<?php echo $_smarty_tpl->tpl_vars['etc']->value['search_select'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['etc']->value['keyword'];?>
&board_idx=<?php echo $_smarty_tpl->tpl_vars['etc']->value['board_idx'];?>
" id="article_<?php echo $_smarty_tpl->tpl_vars['L']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['idx'];?>
"></a></td>
								<td class="hand tal" onclick="view_article('article_<?php echo $_smarty_tpl->tpl_vars['L']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['idx'];?>
')"><?php echo $_smarty_tpl->tpl_vars['L']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['board_title'];?>
</td>
								<td class="hand tal" onclick="view_article('article_<?php echo $_smarty_tpl->tpl_vars['L']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['idx'];?>
')"><?php echo $_smarty_tpl->tpl_vars['L']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['title'];?>
</td>
								<td class="hand tac" onclick="view_article('article_<?php echo $_smarty_tpl->tpl_vars['L']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['idx'];?>
')"><?php echo $_smarty_tpl->tpl_vars['L']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['user_name'];?>
</td>
								<td class="hand tac" onclick="view_article('article_<?php echo $_smarty_tpl->tpl_vars['L']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['idx'];?>
')"><?php echo $_smarty_tpl->tpl_vars['L']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['reg_date'][0];?>
</td>
							</tr>
							<?php }} else {
 ?>
							<tr>
								<td class="p10 tac" colspan="9">등록된 자료가 없습니다.</td>
							</tr>
							<?php
}
?>
						</table>
					</div>
					<div class="card-footer">
						<div class="dataTables_wrapper dt-bootstrap5">
							<div class="row">
								<div class="col-5">
									<button type="button" class="btn btn-secondary"><i class="align-middle white" data-feather="trash-2"></i> 삭제</button>
									<button type="button" class="btn btn-primary" onclick="location.href='?menu=<?php echo $_smarty_tpl->tpl_vars['etc']->value['menu'];?>
&mode=write&idx=<?php echo $_smarty_tpl->tpl_vars['L']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['idx'];?>
&tn=<?php echo $_smarty_tpl->tpl_vars['etc']->value['tn'];?>
&pagenum=<?php echo $_smarty_tpl->tpl_vars['etc']->value['pagenum'];?>
&search_select=<?php echo $_smarty_tpl->tpl_vars['etc']->value['search_select'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['etc']->value['keyword'];?>
&board_idx=<?php echo $_smarty_tpl->tpl_vars['etc']->value['board_idx'];?>
'"><i class="align-middle white" data-feather="plus"></i> 추가</button>
								</div>

								<div class="col-7">
									<div class="dataTables_paginate paging_simple_numbers" id="datatables-buttons_paginate">
										<ul class="pagination">
											<?php echo $_smarty_tpl->tpl_vars['etc']->value['pageclick'];?>

										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php }
}
