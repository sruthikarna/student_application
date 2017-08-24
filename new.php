<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label">
02
<div class="modal-dialog" role="document">
03
<div class="modal-content">
04
<form class="form-horizontal" id="edit-form">
05
<div class="modal-header">
06
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
07
aria-hidden="true">&times;</span></button>
08
<h4 class="modal-title" id="edit-modal-label">Edit selected row</h4>
09
</div>
10
<div class="modal-body">
11
<input type="hidden" id="edit-id" value="" class="hidden">
12
<div class="form-group">
13
<label for="firstname" class="col-sm-2 control-label">Firstname</
14
label>
15
<div class="col-sm-10">
16
<input type="text" class="form-control" id="firstname"
17
name="firstname" placeholder="Firstname" required>
18
</div>
19
</div>
20
<div class="form-group">
21
<label for="email" class="col-sm-2 control-label">E-mail</label>
22
<div class="col-sm-10">
23
<input type="email" class="form-control" id="email"
24
name="email" placeholder="E-mail address" required>
25
</div>
26
</div>
27
<div class="form-group">
28
<label for="mobile" class="col-sm-2 control-label">Mobile</label>
29
<div class="col-sm-10">
30
<input type="text" class="form-control" id="mobile"
31
name="mobile" placeholder="Mobile" required>
32
</div>
33
</div>
34
</div>
35
<div class="modal-footer">
36
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
37
<button type="submit" class="btn btn-primary">Save changes</button>
38
</div>
39
</form>
40
</div>
41
</div>
42
</div>
43
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="add-modallabel">
44
<div class="modal-dialog" role="document">
45
<div class="modal-content">
46
<form class="form-horizontal" id="add-form">
47
<div class="modal-header">
48
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
49
aria-hidden="true">&times;</span></button>
50
<h4 class="modal-title" id="add-modal-label">Add new row</h4>
51
</div>
52
<div class="modal-body">
53
<div class="form-group">
54
<label for="add-firstname" class="col-sm-2 controllabel">
55
Firstname</label>
56
<div class="col-sm-10">
57
<input type="text" class="form-control" id="add-firstname"
58
name="firstname" placeholder="Firstname" required>
59
</div>
60
</div>
61
<div class="form-group">
62
<label for="add-email" class="col-sm-2 control-label">E-mail</
63
label>
64
<div class="col-sm-10">
65
<input type="email" class="form-control" id="add-email"
66
name="email" placeholder="E-mail address" required>
67
</div>
68
</div>
69
<div class="form-group">
70
<label for="add-mobile" class="col-sm-2 control-label">Mobile</
71
label>
72
<div class="col-sm-10">
73
<input type="text" class="form-control" id="add-mobile"
74
name="mobile" placeholder="Mobile" required>
75
</div>
76
</div>
77
</div>
78
<div class="modal-footer">
79
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
80
<button type="submit" class="btn btn-primary">Save changes</button>
81
</div>
82
</form>
83
</div>
84
</div>
85
</div>





<?php
02
if ( isset($_GET['add']) && isset($_POST) ) {
03
dbinit(&$gaSql);
04
$p = $_POST;
05
foreach ( $p as &$val ) $val = mysql_real_escape_string($val);
06
if ( !empty($p['firstname']) && !empty($p['email']) && !empty($p['mobile']) ) {
07
@mysql_query(" INSERT INTO $sTable (name, email, mobile) VALUES ('" . $p['firstname'] . "',
08
'" . $p['email'] . "', '" . $p['mobile'] . "')");
09
$id = mysql_insert_id();
10
$query = mysql_query(" SELECT * FROM $sTable WHERE $sIndexColumn = " . $id,
11
$gaSql['link']);
12
die(json_encode(mysql_fetch_assoc($query)));
13
}
14
}
15
?>





function editRow(id) {
02
if ( 'undefined' != typeof id ) {
03
$.getJSON('datatable.php?edit=' + id, function(obj) {
04
$('#edit-id').val(obj.id);
05
$('#firstname').val(obj.name);
06
$('#email').val(obj.email);
07
$('#mobile').val(obj.mobile);
08
$('#edit-modal').modal('show')
09
}).fail(function() { alert('Unable to fetch data, please try again later.') });
10
} else alert('Unknown row id.');
11
}







<?php
if ( isset($_GET['edit']) && 0 < intval($_GET['edit']) ) {
dbinit(&$gaSql);
// SAVE DATA
if ( isset($_POST) ) {
$p = $_POST;
foreach ( $p as &$val ) $val = mysql_real_escape_string($val);
if ( !empty($p['firstname']) && !empty($p['email']) && !empty($p['mobile']) )
@mysql_query(" UPDATE $sTable SET name = '" . $p['firstname'] . "', email = '" .
$p['email'] . "', mobile = '" . $p['mobile'] . "' WHERE id = " . intval($_GET['edit']));
}
// GET DATA
$query = mysql_query(" SELECT * FROM $sTable WHERE $sIndexColumn = " . intval($_GET['edit']),
$gaSql['link']);
die(json_encode(mysql_fetch_assoc($query)));
}
?>





function removeRow(id) {
2
if ( 'undefined' != typeof id ) {
3
$.get('datatable.php?remove=' + id, function() {
4
$('a[data-id="row-' + id + '"]').parent().parent().remove();
5
}).fail(function() { alert('Unable to fetch data, please try again later.') });
6
} else alert('Unknown row id.');
7
}






<?php
2
if ( isset($_GET['remove']) && 0 < intval($_GET['remove']) ) {
3
dbinit(&$gaSql);
4
// REMOVE DATA
5
@mysql_query(" DELETE FROM $sTable WHERE id = " . intval($_GET['remove']));
6
}
7
?>
