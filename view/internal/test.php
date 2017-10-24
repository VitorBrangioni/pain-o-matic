<?php

header('HTTP/1.1 302 Redirect');
header('Location: ../view/internal/'. $_POST['test']); 