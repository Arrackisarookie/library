USE library;
/* tb_user 表项新增或删除时，tb_role 中对应项新增或删除 */

DROP TRIGGER IF EXISTS library.t_insert_role;
delimiter |
CREATE TRIGGER library.t_insert_role AFTER INSERT ON tb_user FOR EACH ROW
BEGIN
    insert into library.tb_role set sid = new.sid;
END; |
delimiter ;

/* 级联删除大概也可以 */
DROP TRIGGER IF EXISTS library.t_delete_role;
delimiter |
CREATE TRIGGER library.t_delete_role BEFORE DELETE ON tb_user FOR EACH ROW
BEGIN
    delete from library.tb_role where sid = old.sid;
END; |
delimiter ;
