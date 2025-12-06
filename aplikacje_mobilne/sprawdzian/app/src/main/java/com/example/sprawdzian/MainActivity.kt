package com.example.sprawdzian

import android.os.Build
import android.os.Bundle
import android.widget.Toast
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.annotation.RequiresApi
import androidx.compose.foundation.Image
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Row
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.height
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.Menu
import androidx.compose.material3.Button
import androidx.compose.material3.Card
import androidx.compose.material3.CardDefaults
import androidx.compose.material3.ExperimentalMaterial3Api
import androidx.compose.material3.HorizontalDivider
import androidx.compose.material3.Icon
import androidx.compose.material3.IconButton
import androidx.compose.material3.Text
import androidx.compose.material3.TextField
import androidx.compose.material3.TopAppBar
import androidx.compose.material3.TopAppBarDefaults
import androidx.compose.runtime.getValue
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.saveable.rememberSaveable
import androidx.compose.runtime.setValue
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.draw.clip
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.text.font.FontFamily
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.text.style.TextAlign
import androidx.compose.ui.unit.dp
import com.example.sprawdzian.ui.theme.SprawdzianTheme

class MainActivity : ComponentActivity() {
    @RequiresApi(Build.VERSION_CODES.Q)
    @OptIn(ExperimentalMaterial3Api::class)
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)

//        window.navigationBarColor = android.graphics.Color.TRANSPARENT
        window.isNavigationBarContrastEnforced = false

        setContent {
            SprawdzianTheme {
                val contextForToast = LocalContext.current.applicationContext
                Column(horizontalAlignment = Alignment.CenterHorizontally, modifier = Modifier.background(Color.DarkGray). fillMaxSize()) {
                    TopAppBar(
                        title = { Text("Sprawdzian") },
                        navigationIcon = {
                            IconButton(onClick = {
                                Toast.makeText(
                                    contextForToast, "Naciśnięto ikonę nawigacji.",
                                    Toast.LENGTH_SHORT
                                ).show()
                            }) {
                                Icon(
                                    imageVector = Icons.Default.Menu,
                                    contentDescription = "Menu",
                                    tint = Color.DarkGray
                                )
                            }
                        },
                        colors = TopAppBarDefaults.topAppBarColors(
                            containerColor = Color.LightGray,
                            titleContentColor = Color.Magenta
                        )
                    )
                    Text("Hello World!\nDruga linia", textAlign = TextAlign.Center, color = Color.White)
                    HorizontalDivider(modifier = Modifier.padding(10.dp), color = Color.White)
                    Row(modifier = Modifier
                        .align(Alignment.CenterHorizontally)
                        .background(Color.Gray)
                        .padding(10.dp),
                        horizontalArrangement = Arrangement.spacedBy(8.dp),
                        verticalAlignment = Alignment.CenterVertically) {
                        Text("EL1")
                        Text("EL2")
                        Box(
                            modifier = Modifier
                                .background(Color.Yellow)
                                .padding(15.dp)
                        ) {
                            Text("EL3")
                        }
                        Box(
                            modifier = Modifier
                                .background(Color.Yellow)
                                .padding(15.dp)
                        ) {
                            Text("EL4")
                        }
                    }
                    Spacer(Modifier.height(30.dp))
                    Text("Konrad Goliński", Modifier
                        .background(Color.LightGray)
                        .padding(10.dp),
                        color = Color.Red,
                        fontFamily = FontFamily.Cursive)
                    Spacer(Modifier.height(25.dp))

                    var username by rememberSaveable { mutableStateOf("") }

                    TextField(
                        value = username,
                        onValueChange = { username = it },
                        placeholder = {
                            Text("Wprowadź text")
                        },
                        singleLine = false,
                        maxLines = 5
                    )

                    Spacer(Modifier.height(25.dp))

                    Image(painter = painterResource(id = R.drawable.krewetka),
                        contentDescription = "Kor",
                        modifier = Modifier.clip(RoundedCornerShape(15.dp)))

                    Spacer(Modifier.height(25.dp))

                    Card(elevation = CardDefaults.cardElevation(
                        defaultElevation = 6.dp
                    ), colors = CardDefaults.cardColors(
                        containerColor = Color.Yellow
                    )) {
                        Column(
                            modifier = Modifier.padding(15.dp)
                        ) {
                            Text("To jest karta.", fontWeight = FontWeight.Bold)
                            Text("Zawiera elementy w kolumnie,")
                            Text("czyli element pod elementem", fontWeight = FontWeight.Thin)
                        }
                    }

                    Spacer(Modifier.height(25.dp))

                    Button(onClick = {
                        Toast.makeText(
                            contextForToast, "Zatwierdzono",
                            Toast.LENGTH_SHORT
                        ).show()
                    }) {
                        Text("Zatwierdź polecenie...", color = Color.Red)
                    }
                }
            }
        }
    }
}