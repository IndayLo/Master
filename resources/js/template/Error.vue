<template>
  <div class="sample">
    <div class="errorInfoContainer">
      <div style="width: 100%; height: 80px; text-align: center">
        <img
          draggable="false"
          class="brand_logo"
          alt="Logo"
          width="90px"
          height="90px"
          :src="url + '/spa/images/ErrorIcon.png'"
        />
      </div>
      <div style="width: 100%; height: 37px; text-align: center">
        <img
          draggable="false"
          class="brand_logo"
          alt="Logo"
          width="150px"
          height="37px"
          :src="url + '/spa/images/Error.png'"
        />
      </div>
      <div style="width: 100%; height: 47px; text-align: center">
        <!--can change by use of js, but not yet made that function-->
        <img
          draggable="false"
          class="brand_logo"
          alt="Logo"
          width="36px"
          height="47px"
          :src="url + '/spa/images/' + status_code.substr(0,1) + '.png'"
        />
        <img
          draggable="false"
          class="brand_logo"
          alt="Logo"
          width="36px"
          height="47px"
          :src="url + '/spa/images/' + status_code.substr(1,1) + '.png'"
        />
        <img
          draggable="false"
          class="brand_logo"
          alt="Logo"
          width="36px"
          height="47px"
          :src="url + '/spa/images/' + status_code.substr(2,1) + '.png'"
        />
      </div>
      <div style="width: 100%; height: 260px; text-align: center">
        <!--can be change, and set a default if image does not exist-->
        <img
          draggable="false"
          class="brand_logo"
          style="margin-top: -50px"
          alt="Logo"
          width="427px"
          height="321px"
          :src="url + '/spa/images/' + status_code + '.png'"
        />
      </div>
      <div
        id="pHeaderMessage"
        style="
          color: rgb(88, 88, 88);
          font-size: 24px;
          width: 100%;
          height: 40px;
          text-align: center;
        "
      >
        OOOPS, SOMETHING WENT WRONG
      </div>
      <div
        id="pHeaderDetails"
        style="
          color: rgb(88, 88, 88);
          font-size: 12px;
          width: 100%;
          height: 40px;
          text-align: center;
          padding: 0px 10px;
        "
      >
        SORRY FOR THE INCONVINIENCE, WE'RE WORKING ON IT<br />
        TRY TO CLICK THE
        <strong style="font-size: 13px"
          ><a @click="goBack()"><u>GO BACK</u></a></strong
        >
        OR FEEL FREE TO CONTACT US IF THE PROBLEM PERSIST
      </div>
      <div
        style="
          font-size: 12px;
          width: calc(100% - 20px);
          height: 120px;
          margin: 10px;
          border-radius: 8px;
          background-color: rgb(225, 220, 215);
          padding: 10px 10px 10px 0px;
        "
      >
        <div
          style="
            width: 99px;
            height: 103px;
            float: left;
            border-right: 1px solid rgb(100, 110, 120);
          "
        >
          <img
            draggable="false"
            style="width: 100%; margin-top: 3px"
            :src="url + '/spa/images/HelpDesk.png'"
          />
        </div>
        <div style="width: calc(100% - 100px); float: left">
          <div class="ticketInfo head" style="height: 24px">REPORT TICKET</div>
          <!--for the part of info to be reported to helpdesk-->
          <div
            id="pTicketSystemName"
            class="ticketInfo"
            style="margin-top: 5px"
          >
            SYSTEM NAME:
          </div>
          <div class="ticketInfo details" style="margin-top: 5px">
            Laravel SPA
          </div>
          <div id="pTicketErroNumber" class="ticketInfo">STATUS CODE:</div>
          <div class="ticketInfo details">{{status_code}} {{status_name[status_code]}}</div>
          <div class="ticketInfo">OCCURED DATE:</div>
          <div class="ticketInfo details">
            <span>{{ currentTimeStamp }}</span>
          </div>
          <div id="pHelpDeskContact" class="ticketInfo">CONTACT NUMBER:</div>
          <div class="ticketInfo details">
            6123-801 / 6123-777 (SSD Customer Care)
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data: () => ({
      status_code: '',
      url: window.location.origin,
      currentTimeStamp: new Date().getFullYear() + "/" + new Date().getMonth() +
      "/" + new Date().getDate() + " " + new Date().getHours() + ":" +
      new Date().getMinutes() + ":" + new Date().getSeconds(),
      status_name:{
        '400':'Bad Request',
        '401':'Unauthorized',
        '402':'Payment Required',
        '403':'Forbidden',
        '404':'Not Found', 
        '405':'Method Not Allowed',
        '406':'Not Acceptable',
        '407':'Proxy Authentication Required',
        '408':'Request Timeout',
        '409':'Conflict',
        '410':'Gone', 
        '411':'Length Required',
        '412':'Precondition Failed',
        '413':'Payload Too Large', 
        '414':'URI Too Long',
        '415':'Unsupported Media Type',
        '416':'Range Not Satisfiable', 
        '417':'Expectation Failed',
        '418':'Im a Teapot',
        '419':'Page Expired',
        '421':'Misdirected Requested', 
        '422':'Unprocessable Entity',
        '423':'Locked',
        '424':'Failed Dependency',
        '425':'Too Early',
        '426':'Upgrade Required',
        '428':'Precondition Required',
        '429':'Too Many Requests',
        '431':'Request Header Fields Too Large',
        '451':'Unavailable For Legal Reasons',
        '500':'Internal Server Error',
        '501':'Not Implemented',
        '502':'Bad Gateway',
        '503':'Service Unavailable',
        '504':'Gateway Timeout',
        '505':'HTTP Version Not Supported',
        '506':'Variant Also Negotiates',
        '507':'Insufficient Storage',
        '508':'Loop Detected',
        '510':'Not Extended',
        '511':'Network Authentication Required'
      }
    }),

    created(){
      this.status_code = this.$route.params.status_code
    },

    methods:{
      goBack(){
        // this.$store.commit('setStatusCode', null)
        this.$router.go(-1)
      }
    }
  };
</script>

<style>
  .errorInfoContainer {
    height: 645px;
    width: 550px;
    background: rgb(245, 245, 245);
    border-radius: 13px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.19), 0 4px 8px 0 rgba(0, 0, 0, 0.19);
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
  }
  .ticketInfo {
    width: 130px;
    height: 18px;
    float: left;
    color: rgb(100, 110, 120);
    padding-left: 10px;
  }
  .ticketInfo.head {
    width: calc(100% - 2px);
    color: rgb(228, 6, 19);
    font-size: 16px;
    border-bottom: 1px solid rgb(100, 110, 120);
    padding-left: 2px;
    vertical-align: top;
  }
  .ticketInfo.details {
    width: calc(100% - 130px);
    color: rgb(10, 10, 10);
    padding-left: 0px;
  }
</style>