<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diary of Learning</title>
    <link rel="stylesheet" href="./views/css/guru.css">
</head>

<body>

    <div class="container">

        <div class="content">

            <div class="header">
                <div class="header-text">
                    <h2>Student Daily Note Review</h2>
                    <p>A complete list of English journal entries that you need to review and provide feedback for.</p>
                </div>
            </div>
            
            <div class="filter-area">
                <label for="filterStatus">Filter Status:</label>
                <select id="filterStatus">
                    <option>Not Yet Reviewed</option>
                    <option>Already Reviewed</option>
                    <option>All Notes</option>
                </select>

                <label for="filterTipe">Filter Type:</label>
                <select id="filterTipe">
                    <option>All Types</option>
                    <option>Text</option>
                    <option>Audio</option>
                    <option>Image</option>
                </select>
                
                <input type="date" value="2025-10-15">
            </div>

            <div class="data-table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Note Date</th>
                            <th>Student Name</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Review Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2025-10-01</td>
                            <td>Edo Firmansyah (1006)</td>
                            <td>History Lesson Reflection which is very long up to more than 50 characters</td>
                            <td><span class="badge badge-teks">Text</span></td>
                            <td><span class="badge badge-review">PENDING</span></td>
                            <td>
                                <div class="aksi-group">
                                    <button class="btn-lihat">View Review</button>
                                    <button class="btn-check">Mark as Checked</button>
                                </div>
                            </td>
                        </tr>
                        </tr>
                        <tr>
                            <td>2025-10-10</td>
                            <td>Dian Anggraini (1005)</td>
                            <td>Weekend Reflection</td>
                            <td><span class="badge badge-teks">Text</span></td>
                            <td><span class="badge badge-checked">COMPLETED</span></td>
                            <td>
                                <div class="aksi-group">
                                    <button class="btn-lihat btn-disabled">View Feedback</button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>2025-10-05</td>
                            <td>Fiona Cahyadi (1007)</td>
                            <td>Integrity is a valuable trait. (From Vocabulary)</td>
                            <td><span class="badge badge-teks">Text</span></td>
                            <td><span class="badge badge-review">PENDING</span></td>
                            <td>
                                <div class="aksi-group">
                                    <button class="btn-lihat">View Review</button>
                                    <button class="btn-check">Mark as Checked</button>
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            
            <p style="text-align: center; margin-top: 25px; font-size: 0.9em; color: #7f8c8d;">Showing 3 notes out of a total of - notes available in your school.</p>

        </div>

    </div>

</body>

</html>