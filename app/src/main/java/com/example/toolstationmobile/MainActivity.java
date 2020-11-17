package com.example.toolstationmobile;

import androidx.appcompat.app.AppCompatActivity;

import android.app.VoiceInteractor;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity {

    EditText editUser,editPass;
    private static String URL_LOGIN = "";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        editUser = findViewById(R.id.editUser);
        editPass = findViewById(R.id.editPass);

    }


    public void onClick(View v){
        int idC = v.getId();
        if(idC == R.id.btnLogin){
            String username = editUser.getText().toString();
            String password = editPass.getText().toString();

            StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_LOGIN, new Response.Listener<String>() {
                @Override
                public void onResponse(String response) {
                    try {
                        JSONObject jsonObject = new JSONObject(response);

                        String success = jsonObject.getString("success");

                        JSONArray jsonArray = jsonObject.getJSONArray("login");

                        if(success.equals("1")){
                            for (int i=0; i<jsonArray.length(); i++){
                                    JSONObject object = jsonArray.getJSONObject(i);
                                    String name = object.getString("username");
                                    String password = object.getString("username");
                            }
                        }

                    }catch (JSONException e){
                        Toast.makeText(MainActivity.this, "Error" + e.toString(), Toast.LENGTH_SHORT).show();
                    }

                }
            }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Toast.makeText(MainActivity.this, "Error" + error.toString(), Toast.LENGTH_SHORT).show();
                }
            })
            {
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String,String> params = new HashMap<>();
                    params.put("username",username);
                    params.put("username",password);
                    return super.getParams();

                }
            };

        }

    }

}