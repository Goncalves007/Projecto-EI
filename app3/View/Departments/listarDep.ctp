<?php
// Recebo $departamentos
echo '<option value="">Selecione o Departamento</option>\n';       
foreach($departments as $id => $label)
    echo "<option value='$id'>$label</option>\n";       
?> 