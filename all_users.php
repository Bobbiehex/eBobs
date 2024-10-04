<?php include_once "./top_component.php"; ?>
<table>
    <tr>
        <th>#</th>
        <th>Email&nbsp;ID</th>
        <th>Full&nbsp;Name</th>
        <th>House&nbsp;Address</th>
        <th>Action</th>
    </tr>
<?php
include_once "./database_connection.php";
$numbering = 0;
$sql = "SELECT * FROM register_table";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$count = $stmt->rowCount();
$rows = $stmt->fetchAll();

foreach ($rows as $row){ ?>
<tr>
    <td><?php echo ++$numbering ?></td>
    <td><?php echo $row->email_id; ?></td>
    <td><?php echo $row->full_name; ?></td>
    <td><?php echo $row->delivery_address; ?></td>
    <td>
    <form action="delete.php" method="POST">
        <input type="hidden" name= "user_id" value="<?php echo $row->user_id; ?>">
        <button class= "btnDelete" onclick="return confirm('Are you sure you want to delete this record?');">&times;</button>
    </form>
    </td>
</tr>
<?php } ?>
</table>
<div class="count_div">
    <?php echo "Registered Users: ". $count; ?>
</div>

<style>
    .count_div{
        position: absolute;
        top: 6.9em;
        left: 11.3em;
        font=size: 25px;
    }
    table{
        margin: auto;
        margin-top: 4em;
        margin-bottom: 2.9em;
        border: 1px solid #777;
        border-collapse: collapse;
        width: 70%;
    }
    th{
        text-transform: uppercase;
    }
    th, td{
        border: 1px solid #777;
        padding: .8em;
        text-align: left;
    }
    tr:nth-child(even){
        background-color: #f4f4f4;
    }
    .btnDelete{
        display: block;
        margin: auto;
        font-size: 3em;
        color: #777;
        border: 0;
        background-color: transparent;
    }
    .btnDelete:hover{
        color: #ff0000;
        cursor: pointer;
    }
</style>

<?php include_once "./bottom_component.php"; ?>