package metier;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;

public class BDD {

	private Connection cnx;
	private ResultSet rs;
	private PreparedStatement pstm;
	private int ok;


	private void getConnection(){
		String url = "jdbc:mysql://localhost:3306/mglsi_news";
		String user = "root";
		String password = "";
		try{
			Class.forName("com.mysql.jdbc.Driver");
			cnx = DriverManager.getConnection(url, user, password);
		}catch(Exception ex){
			ex.printStackTrace();
		}
	}


	public void initPrepar(String sql){
		getConnection();
		try{
			if(sql.startsWith("insert")){
				pstm = cnx.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS);
			}else{
				pstm = cnx.prepareStatement(sql);
			}
		}catch(Exception ex){
			ex.printStackTrace();
		}
	}


	public ResultSet executeQuery(){
		try{
			rs = pstm.executeQuery();
		}catch(Exception ex){
			ex.printStackTrace();
		}
		return rs;
	}

	public int executeUpdate(){
		try{
			ok = pstm.executeUpdate();
		}catch(Exception ex){
			ex.printStackTrace();
		}
		return ok;
	}
	public void closeConnection(){
		try{
			if(cnx != null){
				cnx.close();
			}
		}catch(Exception ex){
			ex.printStackTrace();
		}
	}

	public PreparedStatement getPstm(){
		return this.pstm;
	}
}
