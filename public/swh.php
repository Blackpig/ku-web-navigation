<?php

 	$Link = "http://kuemdb.kingston.ac.uk";
    $db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = Kuemdb.kingston.ac.uk)(PORT = 14429)))(CONNECT_DATA=(SID=qempr)))"; 
    $conn = oci_connect('QuEMIS', 'QMSKSTS26272', $db);
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
    else{

        $stid2 = oci_parse($conn, "SELECT * from (SELECT  h.request_num, to_char(h.date_raised, 'dd/mm/yy hh:mi'),l.loc_ref, h.desc_of_request,  s.status  FROM ops_hd_help_desk h
        left OUTER JOIN ops_hd_job j ON j.request_num=h.request_num
        left OUTER JOIN sched_o_job_status s ON s.status_id=j.status_id
        inner JOIN core_staff c ON c.staff_id=h.orig_staffid
        inner JOIN bd_location l ON l.loc_id=h.loc_id
        WHERE c.staff_number = 'KU39220'
        and (s.status <> '6 Work order finished ' AND s.status <> '7 Cancelled') 
        order by h.date_raised DESC) 
        where rownum < 31");
        oci_execute($stid2);    
        $cnt1 = 0;
        echo "<div class=\"datagrid\"><table border='1'>\n";
        echo "<thead><tr><th>Ref:</th><th>Date:</th><th>Room:</th><th>User:</th><th>Details:</th><th>Status:</th></tr></thead>";
        while ($row = oci_fetch_array($stid2, OCI_ASSOC+OCI_RETURN_NULLS)) {
            echo "<tr>\n";
            foreach ($row as $item) {
                echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "--") . "</td>\n";
                
                
            }
            $cnt1 ++;
            echo "</tr>\n";
        }
        echo "<tfoot><tr><td colspan=\"5\"> <div id=\"paging\">".$cnt1." tickets...<ul><li><a href=\"". $Link ."\" target = \"new\"><span>Go to Quemis</span></a></li></ul></div></tr></tfoot>";
        echo "</table></div>\n<BR>";

    }
