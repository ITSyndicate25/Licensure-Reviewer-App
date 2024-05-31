<?php
	if(!isset($_SESSION['USERID'])){
	redirect(web_root."admin/index.php");
}

?>
 
 <div class="module-head">
    <h1 class="page-header flex items-center justify-between">
        List of Lessons
        <a href="index.php?view=add" class="btn btn-primary flex items-center">
            <i class="fa fa-plus-circle fw-fa"></i> New
        </a>
    </h1>
</div>
<form action="controller.php?action=delete" method="POST">
    <div class="overflow-x-auto">
        <table id="example" class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="px-4 py-2">Chapter</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">File Type</th>
                    <th class="px-4 py-2" width="30%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $mydb->setQuery("SELECT * FROM  `tbllesson`");
                $cur = $mydb->loadResultList();

                foreach ($cur as $result) {
                    echo '<tr>';
                    echo '<td class="px-4 py-2">' . $result->LessonChapter . '</td>';
                    echo '<td class="px-4 py-2">' . $result->LessonTitle . '</td>';
                    echo '<td class="px-4 py-2">' . $result->Category . '</td>';

                    $view = ($result->Category == "Video") ? "index.php?view=playvideo&id=" . $result->LessonID : "index.php?view=viewpdf&id=" . $result->LessonID;

                    echo '<td class="px-4 py-2 text-center">
                            <a title="Edit Details" href="index.php?view=edit&id=' . $result->LessonID . '" class="btn btn-primary btn-xs">
                                <span class="fa fa-edit fw-fa"></span> Edit
                            </a>
                            <a title="Change File" href="index.php?view=uploadfile&id=' . $result->LessonID . '" class="btn btn-primary btn-xs">
                                <span class="fa fa-upload fw-fa"></span> Change File
                            </a>
                            <a title="View Files" href="' . $view . '" class="btn btn-info btn-xs">
                                <span class="fa fa-info fw-fa"></span> View
                            </a>
                            <a title="Delete" href="controller.php?action=delete&id=' . $result->LessonID . '" class="btn btn-danger btn-xs">
                                <span class="fa fa-trash-o fw-fa"></span> Delete
                            </a>
                        </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</form>

	 