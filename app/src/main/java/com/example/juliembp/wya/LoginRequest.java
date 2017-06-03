package com.example.juliembp.wya;

import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.Request.Method;

import java.util.HashMap;
import java.util.Map;

public class LoginRequest extends StringRequest{

    private static final String URL = "https://wya.000webhostapp.com/";
    private Map<String, String> params;

    public LoginRequest(String email, String username, String password, Response.Listener<String> listener){
        super(Method.POST, URL, listener, null);
        params = new HashMap<>();
        params.put("username", username);
        params.put("password", password);
    }
    @Override
    public Map<String, String> getParams() {
        return params;
    }
}
