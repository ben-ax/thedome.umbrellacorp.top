<?php


function getEntries($id)
{
    include("_config.php");
    //Fetch entries
    if($result = mysqli_query($conn, "SELECT * FROM ResearchEntries WHERE researchObjectId='$id' ORDER BY entryDate DESC, entryTime DESC, ID DESC"))
    {
        $entryOutput = "";
        while($row = mysqli_fetch_assoc($result)) 
        {
            $entryId = $row["ID"];
            $entryHeading = $row["entryHeading"];
            $entryText = $row["entryText"];
            $entryWriter = $row["entryWriter"];
            $entryDate = $row["entryDate"];
            $entryTime = $row["entryTime"];

            $writerName = "Name not found";
            if($result2 = mysqli_query($conn, "SELECT e.name FROM users u LEFT JOIN employees e ON u.employeeCode = e.employeeCode WHERE u.employeeCode='$entryWriter'"))
            {
                while($row = mysqli_fetch_assoc($result2)) 
                {
                    $writerName = $row["name"];
                }
            }

            $entryOutput .= "<table class=\"entryTable\" cellspacing=\"0\" cellpadding=\"0\">" .
                            "<tr>".
                                "<td style=\"width: 100%;\">".$entryWriter." (".$writerName.") | ".$entryDate." | Kl ".$entryTime."</td><td rowspan=\"2\" style=\"text-align: right; vertical-align: bottom;\"><a class=\"deleteButton\" href=\"/research_entry_delete_doit.php?id=".$entryId."&objectId=".$id."\" style=\"text-decoration:none;\" onClick=\"return confirm('Are you sure you want to delete entry?');\">D</a></td>".
                            "</tr>".
                            "<tr>".
                                "<td class=\"entryHeading\">".$entryHeading."</td>".
                            "</tr>".
                            "<tr>".
                                "<td class=\"entryBox\" colspan=\"2\">".$entryText."</td>".
                            "</tr>".
                        "</table>";

        }
        return $entryOutput;

    }
            
}

?>