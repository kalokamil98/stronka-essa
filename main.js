async function send_hook() {
  var message = await document.querySelector("#message").value;
  var name = await document.querySelector("#name").value;
  var email = await document.querySelector("#email").value;
  var hook_url =
    "https://discord.com/api/webhooks/898975900492775494/bvkU_G4CDD5PpPDBYofjAxNVrhsRI2WIcCD4vPNyhmmkUo1HLjgNxHXmdrKrPGgEihA3";
  var body = {
    type: 1,
    id: "898975900492775494",
    name: "Reliance",
    avatar: "dc83768ce8162219a9a931bf3adaab3c",
    channel_id: "898975873699553310",
    guild_id: "770697641167290369",
    application_id: null,
    token:
      "bvkU_G4CDD5PpPDBYofjAxNVrhsRI2WIcCD4vPNyhmmkUo1HLjgNxHXmdrKrPGgEihA3",

    embeds: [
      {
        color: 14071513,
        author: {
          name: `${name} - ${email}`,
        },
        tittle: "Reliance Webhook",
        description: "",
        fields: [
          {
            name: "Wiadomość:",
            value: message,
          },
        ],
      },
    ],
  };

  console.log(message);

  const response = await fetch(hook_url, {
    headers: {
      "Content-Type": "application/json",
    },
    method: "POST",
    body: JSON.stringify(body),
  });

  return response;
}

var send = false;

document.querySelector("#send").addEventListener("click", () => {
  if (!send) {
    send_hook()
      .then((data) => {
        console.log(data);
        send = true;
      })
      .catch((err) => alert("Błąd połączenia"));
  } else alert("Już wysłano widomość");
});
