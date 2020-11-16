package com.example.toolstationmobile;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.EditText;

public class MainActivity extends AppCompatActivity {

    EditText editUser,editPass;
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
        
        }
    }

}