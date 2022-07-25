package serveur;

import javax.xml.ws.Endpoint;

import service.UsersWS;

public class ServeurWS {

	public static void main(String[] args){

		String url ="http://localhost:8585/";
		Endpoint.publish(url, new UsersWS());

		System.out.println(url);
	}

}


