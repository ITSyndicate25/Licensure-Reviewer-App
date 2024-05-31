<!--<h1><?php echo $title;?></h1>-->
<div class="flex flex-col lg:flex-row gap-8">
    <div class="lg:w-1/2">
        <h3 class="text-lg font-semibold mb-4">PDF</h3>
        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class=" text-Black">
                    <tr>
                        <th class="w-1/6 lg:w-1/12 px-4 py-2">#</th>
                        <th class="w-2/6 lg:w-4/12 px-4 py-2">Chapter</th>
                        <th class="w-3/6 lg:w-5/12 px-4 py-2">Title</th>
                        <th class="w-1/6 lg:w-2/12 px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sql = "SELECT * FROM tbllesson WHERE Category='Docs'";
                    $mydb->setQuery($sql);
                    $cur = $mydb->loadResultList();
                    foreach ($cur as $result) {
                        echo '<tr class="hover:bg-gray-100">';
                        echo '<td class="border px-4 py-2">'.$result->LessonID.'</td>';
                        echo '<td class="border px-4 py-2">'.$result->LessonChapter.'</td>';
                        echo '<td class="border px-4 py-2">'.$result->LessonTitle.'</td>';
                        echo '<td class="border px-4 py-2"><a href="index.php?q=viewpdf&id='.$result->LessonID.'" class="px-4 py-2 text-xs text-white bg-sky-700 rounded hover:bg-sky-950 flex items-center justify-center"><i class="fa fa-info"></i> View File</a></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="lg:w-1/2">
        <h3 class="text-lg font-semibold mb-4">VIDEO</h3>
        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class=" text-Black">
                    <tr>
                        <th class="w-1/6 lg:w-1/12 px-4 py-2">#</th>
                        <th class="w-4/6 lg:w-9/12 px-4 py-2">Description</th>
                        <th class="w-1/6 lg:w-2/12 px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sql = "SELECT * FROM tbllesson WHERE Category='Video'";
                    $mydb->setQuery($sql);
                    $cur = $mydb->loadResultList();
                    foreach ($cur as $result) {
                        echo '<tr class="hover:bg-gray-100">';
                        echo '<td class="border px-4 py-2">'.$result->LessonID.'</td>';
                        echo '<td class="border px-4 py-2">'.$result->LessonTitle.'</td>'; 
                        echo '<td class="border px-4 py-2"><a href="index.php?q=playvideo&id='.$result->LessonID.'" class="px-4 py-2 text-xs text-white bg-sky-700 rounded hover:bg-sky-950 flex items-center justify-center"><i class="fa fa-play"></i> Play Video</a></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

