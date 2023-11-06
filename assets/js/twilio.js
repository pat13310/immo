async function sendMessage(toNumber, message) {
  const accountSid = "AC0948d9d48aedfdba109712de1149d6b9";
  const authToken = "ee8658074a76dc7cd0195f9102b630a5";
  const fromNumber = "+16315199768";
  const url = `https://api.twilio.com/2010-04-01/Accounts/${accountSid}/Messages.json`;
  try {
    let response = await fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        Authorization: `Basic ${btoa(`${accountSid}:${authToken}`)}`,
      },
      body: `From=${fromNumber}&To=${toNumber}&Body=${message}`,
    });
    let status = response.status;
    if (status === 201) {
      console.log("Message envoyé avec succès !");
      return "Message envoyé avec succès !";
    } else {
      console.error("Une erreur est survenue lors de l'envoi du message.");
      return "Une erreur est survenue lors de l'envoi du message.";
    }
  } catch (error) {
    console.error(error);
    return error;
  }
}

async function sendCode(codeInt, toNumber) {
  toNumber = `${codeInt}${toNumber.substring(1, toNumber.length)}`;
  const min = 1000;
  const max = 9999;
  const code = Math.floor(Math.random() * (max - min + 1)) + min;
  return await sendMessage(toNumber, `Code de vérification : ${code}`);
}
