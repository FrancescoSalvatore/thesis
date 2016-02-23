package com.francescosalvatore.coap.connector;

import org.eclipse.californium.core.CoapResponse;

import twitter4j.Twitter;
import twitter4j.TwitterException;
import twitter4j.TwitterFactory;
import twitter4j.conf.ConfigurationBuilder;

public class TwitterConnector extends Connector {
	
	private TwitterFactory _twitterFactory;
	private Twitter _twitter;
	private ConfigurationBuilder _configurationBuilder;
	
	private String _consumerKey;
	private String _consumerSecret;
	private String _accessToken;
	private String _accessTokenSecret;
	
	private boolean _init = false;
	
	public TwitterConnector() {}
	
	public TwitterConnector(String connectionInfo)
	{
		parseConnectionInfo(connectionInfo);
		_twitterFactory = new TwitterFactory(_configurationBuilder.build());
		_twitter = _twitterFactory.getInstance();
		_init = true;
	}
	
	@Override
	public void onLoad(CoapResponse response)
	{
		if(!_init) return;
		System.out.println("Twitter Connector activated by the resource, posting \""+response.getResponseText()+"\"...");
		try 
		{
			_twitter.updateStatus(response.getResponseText());
		} 
		catch (TwitterException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

	@Override
	public void parseConnectionInfo(String connectionInfo) {
		String[] split = connectionInfo.split(",");
		_consumerKey = split[0];
		_consumerSecret = split[1];
		_accessToken = split[2];
		_accessTokenSecret = split[3];
		
		_configurationBuilder = new ConfigurationBuilder();
		_configurationBuilder.setDebugEnabled(true)
		.setOAuthConsumerKey(_consumerKey)
		.setOAuthConsumerSecret(_consumerSecret)
		.setOAuthAccessToken(_accessToken)
		.setOAuthAccessTokenSecret(_accessTokenSecret);
	}
	
	public void init()
	{
		_twitterFactory = new TwitterFactory(_configurationBuilder.build());
		_twitter = _twitterFactory.getInstance();
		_init = true;
	}
	
	public String getConsumerKey()
	{
		return _consumerKey;
	}
	
	public void setConsumerKey(String consumerKey)
	{
		_consumerKey = consumerKey;
	}
	
	public String getConsumerSecret()
	{
		return _consumerSecret;
	}
	
	public void setConsumerSecret(String consumerSecret)
	{
		_consumerSecret = consumerSecret;
	}
	
	public String getAccessToken()
	{
		return _accessToken;
	}
	
	public void setAccessToken(String accessToken)
	{
		_accessToken = accessToken;
	}
	
	public String getAccessTokenSecret()
	{
		return _accessTokenSecret;
	}
	
	public void setAccessTokenSecret(String accessTokenSecret)
	{
		_accessTokenSecret = accessTokenSecret;
	}

}
