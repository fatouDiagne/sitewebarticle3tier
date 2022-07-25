package service;

import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;
import javax.jws.WebMethod;
import javax.jws.WebService;
import metier.BDD;
import metier.Users;

@WebService(name="UserService")
public class UsersWS {

	private BDD db = new BDD();
	private int ok;

	@WebMethod(operationName="AjouterUser")
	public int add(String login, String password) {
		String sql = "INSERT INTO users VALUES(NULL, ?, ?)";
		try{
			db.initPrepar(sql);
			db.getPstm().setString(1, login);
			db.getPstm().setString(2, password);

			ok = db.executeUpdate();
		}catch(Exception ex){
			ex.printStackTrace();
		}
		return ok;
	}

@WebMethod(operationName ="GetUsers")
public List<Users> getUsers() {

	 try
	 {

	 List<Users> users= new ArrayList<>();

     String sql= "select id,login,password from users ";

    	 	db.initPrepar(sql);

    	 	  ResultSet res= db.executeQuery();

    	 	  while (res.next())
    	      {
    	          users.add(new Users(res.getInt("id"),res.getString("login"),res.getString("password")));
    	      }
    	      return users;

    	} catch (Exception E) {
            System.out.println("Erreur");
    	}
     return null;
}

@WebMethod(operationName="ModifierUser")
public int update(int id,String login) {
	String sql = "UPDATE users SET id = 6 where login = ?";
	try{
		db.initPrepar(sql);
		db.getPstm().setString(1, login);

		ok = db.executeUpdate();
	}catch(Exception ex){
		ex.printStackTrace();
	}
	return ok;
}

@WebMethod(operationName="SupprimerUser")
public int delete(int id) {
	String sql = "DELETE FROM users where id = ?";
	try{
		db.initPrepar(sql);
		db.getPstm().setInt(1, id);

		ok = db.executeUpdate();
	}catch(Exception ex){
			ex.printStackTrace();
		}
	return ok;
}


}
