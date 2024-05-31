<div class="lg:flex">
    <div class="lg:w-1/2 mb-4 lg:mb-0">
        <h3 class="text-lg font-semibold mb-2">PDF</h3>
        <div class="overflow-x-auto">
            <table id="example" class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2">#</th>
                        <th class="py-2">Chapter</th>
                        <th class="py-2">Title</th> 
                        <th class="py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sql = "SELECT * FROM tbllesson WHERE Category='Docs'";
                    $mydb->setQuery($sql);
                    $cur = $mydb->loadResultList();
                    foreach ($cur as $index => $result) {
                        echo '<tr>';
                        echo '<td class="border py-2">' . ($index + 1) . '</td>';
                        echo '<td class="border py-2">' . $result->LessonChapter . '</td>';
                        echo '<td class="border py-2">' . $result->LessonTitle . '</td>';
                        echo '<td class="border py-2"><a href="' . web_root . 'admin/modules/lesson/' . $result->FileLocation . '" class="px-4 py-2 text-xs text-white bg-sky-700 rounded hover:bg-sky-950 flex items-center justify-center"><i class="fa fa-info"></i> Download</a></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="lg:w-1/2">
        <h3 class="text-lg font-semibold mb-2">VIDEO</h3>
        <div class="overflow-x-auto">
            <table id="example2" class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2">#</th>
                        <th class="py-2">Description</th>
                        <th class="py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sql = "SELECT * FROM tbllesson WHERE Category='Video'";
                    $mydb->setQuery($sql);
                    $cur = $mydb->loadResultList();
                    foreach ($cur as $index => $result) {
                        echo '<tr>';
                        echo '<td class="border py-2">' . ($index + 1) . '</td>';
                        echo '<td class="border py-2">' . $result->LessonTitle . '</td>'; 
                        echo '<td class="border py-2"><a href="' . web_root . 'admin/modules/lesson/' . $result->FileLocation . '" class="px-4 py-2 text-xs text-white bg-sky-700 rounded hover:bg-sky-950 flex items-center justify-center"><i class="fa fa-info"></i> Download</a></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
