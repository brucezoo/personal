<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/1
 * Time: 10:40
 */
fwrite(STDOUT,'zhufeng\n');
fwrite(STDOUT , "\nthis is a test\n");
fwrite(STDOUT, "7777888");
fclose(STDOUT);
while($line = fopen('php://stdin','r')){
    echo fgets($line);
}