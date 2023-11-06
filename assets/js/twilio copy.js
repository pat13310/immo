class Twilio {
  constructor() {
    this.url =   `https://api.twilio.com/2010-04-01/Accounts/${this.accountSid}/Messages.json`;

    this.accountSid = "AC0948d9d48aedfdba109712de1149d6b9";
    this.auth =
      "AC0948d9d48aedfdba109712de1149d6b9:ee8658074a76dc7cd0195f9102b630a5";
    this.twilioNumber = "+16315199768";
  }

  sendMessage(number, message) {
    const response = fetch(this.url, {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        Authorization: `Basic ${btoa(`${this.auth}`)}`,
      },
      mode: "cors",
      body: `To=${number}&From=${this.twilioNumber}&Body=${encodeURIComponent(
        message
      )}`,
    });

    /*if (response.ok) {
        const data = await response.json();
        console.log(data);
      } else {
        throw new Error("Erreur lors de la récupération des données");
      }*/
  }
}

function sendMessage(toNumber, message) {
  const accountSid = "AC0948d9d48aedfdba109712de1149d6b9";
  const authToken = "ee8658074a76dc7cd0195f9102b630a5";
  const fromNumber = "+16315199768";
  const url = `https://api.twilio.com/2010-04-01/Accounts/${accountSid}/Messages.json`;

  fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
      Authorization: `Basic ${btoa(`${accountSid}:${authToken}`)}`,
    },
    body: `From=${fromNumber}&To=${toNumber}&Body=${message}`,
  })
    .then((response) => {
      if (response.status === 201) {
        console.log("Message envoyé avec succès !");
      } else {
        console.error("Une erreur est survenue lors de l'envoi du message.");
      }
    })
    .catch((error) => console.error(error));
}
