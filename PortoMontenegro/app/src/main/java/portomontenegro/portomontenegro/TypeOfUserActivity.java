package portomontenegro.portomontenegro;

import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;

/**
 * Created by user on 23.5.2018..
 */

public class TypeOfUserActivity extends AppCompatActivity
{
    Button guestBTN, visitorBTN;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.choose_user_layout);

        guestBTN = findViewById(R.id.guestID);
        visitorBTN = findViewById(R.id.visitorID);
    }

    @Override
    protected void onStart()
    {
        super.onStart();

        guestBTN.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View view)
            {
                startActivity(new Intent(getApplicationContext(), MainActivity.class).putExtra("TYPEOFUSER","Guest"));
            }
        });

        visitorBTN.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View view)
            {
                startActivity(new Intent(getApplicationContext(), MainActivity.class).putExtra("TYPEOFUSER","Visitor"));
            }
        });
    }
}
