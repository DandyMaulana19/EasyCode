<?php
include('../../components/navbar.php');
include("../../Controllers/auth.php");

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/css/Admin/Course.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>EasyCode | Platform Belajar Coding</title>
</head>

<section>

    <div class="page">
        <h2>Create Course</h2>
        <form name="form" method="POST" action="../../Controllers/CourseController.php" enctype="multipart/form-data">

            <div class="inputForm">

                <div class="wrapper">
                    <label for="category">Category:</label>
                    <select id="category" name="category">
                        <option value="Web Development">Web Development</option>
                        <option value="Mobile Development">Mobile Development</option>
                        <option value="Data">Data Science</option>
                    </select>
                </div>

                <div class="wrapper">
                    <label for="image">Thumbnail:
                        <input type="file" name="image" id="image" accept="image/jpeg, image/png, image/jpg, image/gif" required>
                    </label>
                </div>

                <div class="wrapper">
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" placeholder="Masukkan Harga" required>
                </div>

                <div class="wrapper">
                    <label for="materi">Materi:</label>
                    <input type="text" id="materi" name="materi" placeholder="Masukkan Materi" required>
                </div>

                <div class="wrapper">
                    <label for="rank">Level:</label>
                    <select id="rank" name="rank">
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advanced">Advanced</option>
                    </select>
                </div>

                <button type="submit" name="addCourse" value="add">Create Course</button>
            </div>
        </form>

        <table>
            <thead>
                <tr class="tableHeader">
                    <th class="First">ID</th>
                    <th>Kategori</th>
                    <th>Thumbnail</th>
                    <th>Price</th>
                    <th>Materi</th>
                    <th>Rank</th>
                    <th class="Last">Action</th>
                </tr>
            </thead>

            <tbody>

                <?php
                include("../../Models/Course.php");
                $data = new Course();
                $courses = $data->showAll();
                foreach ($courses as $course) :
                ?>
                    <tr>
                        <td><?= $course['idCourse'] ?></td>
                        <td><?= $course['category'] ?></td>
                        <td><?= $course['image'] ?></td>
                        <td><?= $course['price'] ?></td>
                        <td><?= $course['materi'] ?></td>
                        <td><?= $course['rank'] ?></td>
                        <td class="action"><a href="./Course_update.php?status=update&id=<?= $course['idCourse'] ?>">Edit</a><a href="../../Controllers/CourseController.php?status=del&id=<?= $course['idCourse'] ?>">Delete</a></td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>

</section>

<?php
include('../../components/footer.php')
?>