<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //802 words
        $wordList = [
            "ymznr", "ftkhx", "lcwup", "dkfbo", "hneqg", "rujio", "spzac", "obgwx", "lyeif", "smxtj",
            "krpld", "cujts", "woxfa", "mvyht", "zbois", "exlpq", "dqvgu", "inwyr", "ajkhz", "byuem",
            "pxlwa", "ogmhz", "fawqi", "tqxsn", "decmj", "sgxpy", "ruzoq", "cetvb", "nqvrm", "khfux",
            "rzymd", "slukc", "ajont", "pqdmu", "fkixh", "hyjnu", "ogmyz", "stfal", "dplzx", "xhuyn",
            "ylcgh", "bpdnx", "iqjxf", "mwlsu", "xtuyg", "zprqw", "buvon", "rmayi", "sgohe", "uiztx",
            "hbden", "efpom", "lqkjw", "wgriv", "pozex", "mtkfw", "azhoj", "cyexv", "vuldi", "bfrak",
            "koqxm", "ysjhv", "wjtbz", "inxrm", "cvlso", "zudjc", "gxfhi", "anpoy", "qpdgl", "lrkiw",
            "bovtl", "vflgn", "thdjb", "uzciw", "ngykl", "yekqo", "afnjw", "lmkud", "xayig", "gpzmr",
            "sefzn", "dwlmx", "buvej", "yrnld", "tszmg", "qybap", "piwnz", "kovxs", "hscxd", "jrzty",
            "ndasq", "twolu", "vdcns", "xjlgw", "brzpf", "tqcvu", "elwax", "iuqdf", "mgosn", "bhdzu",
            "fwpyl", "quenr", "pzyck", "iwdmo", "kohsf", "gabwn", "clfoe", "pjztm", "dgtak", "mbxhr",
            "kuzrt", "ajlnq", "msfwe", "onpuc", "tlgji", "hqvws", "rdykm", "xoaun", "vlkiy", "iqedz",
            "ayfvo", "wcslr", "pntva", "orilj", "djtbg", "xigle", "msvkd", "gvxok", "cawln", "qzomt",
            "yhguq", "kqmjr", "vlfaz", "wjixs", "ftzkl", "soilb", "jynpa", "qctfm", "pgbie", "aoyhr",
            "edqhl", "plvka", "uqfbt", "ftwov", "vxipz", "ljmoe", "drwcy", "uksfb", "hiqga", "gnvpr",
            "orwys", "emkdj", "fplbw", "ytqoh", "oknrz", "nhuyv", "elzdi", "sfubr", "dpitm", "xwnyq",
            "jrtvi", "kbcxn", "utgma", "sywvq", "cjzar", "ztgil", "qyaoe", "vdzwb", "huqcs", "pontg",
            "fwtin", "ycudw", "grbwo", "ndmzs", "hkfcq", "xrjgo", "vukld", "wbloz", "seqkn", "nzglv",
            "zpxro", "atdsc", "wlzrj", "fezck", "obhvu", "rkyjq", "jonts", "unhrv", "cmvwe", "yiglx",
            "qwmzd", "txpoh", "mlvcr", "vubtk", "slyoa", "dqiwh", "ixsbj", "twzuo", "gyhrp", "eolnz",
            "wtdml", "azevi", "fmhbp", "umdkj", "pwycs", "ovlha", "riqjs", "ntbuw", "xzkoc", "mvynf",
            "bldpy", "zojeu", "qfhki", "ksrxl", "naqtb", "mvlfz", "rzjyn", "kfzwu", "gxolb", "mljty",
            "hyqcx", "upacw", "zhlfx", "stcje", "bvfgi", "orqka", "qjluw", "ecnoy", "tzbka", "yslrn",
            "nugyz", "wvxtd", "pjrvb", "mjdog", "zvdxs", "xbmqn", "clwie", "knspf", "hvqwm", "lyxic",
            "snbqo", "gmvkb", "jyaxh", "prvdi", "zmgdk", "ctkxq", "uxjwh", "odgft", "vqpkb", "iklfx",
            "wqvzp", "ajmle", "frzus", "qadlj", "owndv", "hxtvi", "jlscp", "uqfie", "rdbsz", "znfmt",
            "pqbsl", "dlhca", "wvfeb", "mtbzj", "bxynr", "jlzfr", "asuhg", "tuxqz", "qfzxg", "ewghc",
            "ngmzb", "xepkj", "kvqwa", "zrmci", "dsocx", "pglzy", "xtnmf", "zjwkb", "crlau", "yxfuz",
            "pqdcv", "olqwi", "zjxtf", "yopwk", "scvgd", "ibyhd", "xeuhn", "lkqdo", "unryv", "hlgjz",
            "zjrut", "vymfg", "cxtzk", "skgph", "tnjlb", "lfhwi", "qdwix", "vbyzt", "fsdym", "ogwce",
            "khjwm", "jnsud", "xvqmk", "itfwu", "rqzse", "wbhco", "yfsvz", "ngtpi", "lkxyb", "bzmqt",
            "slmnp", "vzocq", "nxofa", "bpuqe", "rdxjw", "cajnm", "tuflx", "pqsoe", "gdwlr", "abvqs",
            "puzdm", "gfvwn", "qzjgx", "xulph", "wtqlg", "lqojp", "cbsjk", "hvlze", "fexnq", "krvci",
            "pqfws", "bdvzi", "wtjpz", "rlnyc", "ugnpq", "sazhv", "lmeji", "cqrbu", "vkgtx", "yfrwv",
            "njsra", "xozfp", "ywsiv", "aoiru", "hmtsg", "vxjko", "znakx", "iqexw", "uphfg", "fwzeq",
            "kmsyl", "xdalw", "yinpv", "zplkj", "mtrvs", "azgxe", "dhqlj", "wrgyn", "kzrxo", "smcje",
            "cqosv", "jipqr", "ztmdc", "xqosw", "vzqfb", "eiwfu", "uksdh", "njzrq", "bxiug", "wljfs",
            "dtrvl", "inpbw", "fivda", "gokxb", "ldxfj", "krnyh", "vbmgo", "ixfdm", "jufgs", "wzngu",
            "hxlqn", "pwlva", "bqnhc", "ixmlf", "pzyag", "djxyh", "uqebd", "knvzs", "stroi", "dzpwm",
            "kjihd", "bwjpx", "goqwn", "qdxvh", "yguwm", "zbtqf", "xpnhg", "uayor", "kvnzi", "zdkst",
            "foznj", "qkmgi", "rjbxi", "hkngt", "ptcak", "wevjr", "ubktq", "szfmo", "xwzjq", "jatym",
            "idzow", "rlkxh", "euasc", "otqmk", "qdtnb", "wjgrm", "kcqpu", "mdybn", "snkpj", "qgyvt",
            "hscaj", "gpbeu", "iucwb", "qtjlx", "bnhqz", "kzcue", "tfdmw", "wxvbn", "lacyu", "gmksb",
            "owlyz", "rbzeo", "dzpwi", "tjqnh", "wukao", "hjiev", "yxzdu", "gsbhm", "tufrd", "ljfxg",
            "gzojw", "pnrwm", "vxeyb", "ycdne", "waqik", "bvkxt", "gfrim", "rmbjt", "jkgxv", "zvtns",
            "qwuzm", "fyhmr", "txbcn", "lwzxa", "bmtqj", "kpeoh", "ugitw", "zkojt", "ryefn", "jguwm",
            "psdyc", "bfknx", "nlwug", "jfdqr", "tvypi", "sujdn", "yvwol", "zmlkt", "elrxw", "kypfw",
            "bnozj", "txrvf", "acqeu", "zmypq", "pwtmi", "rhgxt", "cvanl", "ufsyi", "vqejr", "nldcm",
            "tdgya", "zuqcp", "jvchz", "lprwb", "kebaw", "cijty", "qljwm", "hgqwo", "stqrm", "vjoyz",
            "tuqba", "sremv", "kfobn", "pgucr", "rceiy", "bjvut", "uzefw", "oynlm", "tulvb", "xpyor",
            "kwfum", "rpzqe", "nhtau", "ijrpd", "bexio", "gpwth", "vsqir", "ufrpi", "onwbj", "qbvsm",
            "xcnvd", "ldopq", "ifauz", "vtylz", "ugzxt", "ebdlq", "hknlf", "lxzcq", "rjzvw", "htfqi",
            "yqorz", "xmcge", "baqht", "rvbzn", "lgtox", "vfmrz", "wrlpj", "qmsdx", "gnlhv", "skzay",
            "yxobw", "wiupr", "hifoj", "deilw", "xkmco", "gozpw", "tpzlj", "wiqzc", "xvzpd", "nwbve",
            "tkymh", "pqaob", "ywcvm", "stqlu", "azfmq", "odljp", "wzjfs", "bphkm", "vfzod", "sxkaw",
            "enxfj", "qftzb", "xuvkl", "bmkec", "fpzgn", "atcqv", "ekgjf", "oyxws", "frkta", "qjvsl",
            "sdqvm", "yfnmq", "utbca", "imqzn", "xqjyl", "wkahb", "cvktd", "odlfw", "pvjza", "zwcyf",
            "fdejl", "nuvrx", "qwlvr", "bmvxr", "edwuk", "fphgn", "toxbm", "jrwik", "ovzfn", "skxce",
            "tljun", "cwvzu", "bdtly", "pahkb", "zihtu", "wvjnt", "gwezv", "fybxz", "vmuqj", "crgeq",
            "qsxth", "wbfzt", "yjekb", "bjwdu", "lswfp", "vpxuc", "hcqaz", "kuepj", "ozrjd", "ujflv",
            "tvkgm", "ilxjz", "bwajc", "cynqr", "fpmhq", "rgdjv", "omdzx", "vyhqk", "gxwfo", "rhluk",
            "omdte", "uynjf", "eqxmo", "twzgx", "qfzae", "zujmv", "ncplj", "tkrzo", "bzqgu", "jxhoi",
            "wcdfy", "suzjf", "vkhdi", "zroae", "otpcx", "sgviy", "ipauj", "zbjwe", "cftly", "uhoyg",
            "erwkl", "mhzle", "sxqgr", "vndfy", "ctoji", "xmkaq", "wncul", "pdqrz", "bnxkm", "kzmqy",
            "ilxdn", "gwxms", "htevb", "plufx", "nzjpg", "kcvli", "qbvhy", "rtncl", "gyzvf", "ifjns",
            "juvgr", "dshbx", "xgkmo", "cwphf", "byqva", "zrqlf", "tdnzm", "imkcy", "upzng", "bdxwj",
            "yufwk", "zcmjs", "dpuaw", "tksrq", "cjhmy", "owmvj", "ubnkl", "gazlf", "wltpe", "qljts",
            "mjkte", "pruyh", "xeuwc", "tkzvd", "rdqjo", "cmjgq", "wypvf", "etckr", "znvqm", "uylzm",
            "ioqgm", "dyhnb", "pzcuq", "tjxow", "zeaqy", "unjiw", "btovi", "fkdht", "pvruy", "srxtn",
            "thqpz", "mlnzi", "nxjdl", "pfaqr", "dghwj", "icayx", "ohtwf", "tirnl", "byqhg", "yrjnf",
            "eqbhm", "vyeqg", "tpzwm", "bmwzv", "xdclt", "tjyvz", "orapf", "wnbhq", "geuwh", "qclmg",
            "nwmxj", "fbjog", "yxnqv", "chryo", "qktla", "viwne", "fcylr", "avpdq", "ptqba", "juqzm",
            "zoivw", "qyomc", "pilre", "fngrm", "whzxp", "ilpsy", "uhzbg", "kfdcy", "psbnm", "voplr",
            "ykxpb", "fsbmo", "tkviz", "nyzqj", "plqim", "gjqyh", "lrzmu", "kcbgf", "tefwq", "dpcbm",
            "evwpq", "bgruv", "ojzhx", "njluf", "fkeiv", "cxnml", "psvqy", "tjrhe", "zlubc", "qdpwm",
            "sfrej", "cjlvi", "qrslz", "sbkmt", "utdch", "jmzfw", "ztgdv", "naqkp", "gmeyc", "diyzk",
            "kdfxw", "lejug", "nfhuq", "qylks", "xuzhc", "rzibj", "gkdcn", "olpqv", "ndxzq", "jfzxo",
            "wfmij", "cwhrf", "bqztc", "ykuwp", "uxlkc", "zdvul", "tkayx", "mzjow", "vfrsi", "hlxtb",
            "bkupe", "nljxv", "cjims", "ghbqv", "iwzys", "vchzq", "yiqle", "usdkn", "otixy", "pgzry",
            "nkehs", "rzjkl", "xdhkw", "wjbzg", "zojrn", "qviwp", "cufxl", "dmgzr", "vjtle", "rszcq",
            "xjbuw", "ywtnl", "jcvdk", "zbkux", "wyvgj", "kcdrp", "ysjof", "khifv", "nrfkl", "wakbt",
            "hpvyn", "dgxjk", "kuhpm", "lpzej", "bnxfr", "kbsim", "dfzso", "lrktz", "wxkqe", "gohsu",
            "htbnq", "wxrjq", "kgvln", "eztsq", "pbqwi", "zgqxh", "xqfzk", "lunpr", "oqaxe", "kfzru",
            "zlxsc", "fxjsd", "aovlz", "xylth", "igwmr", "vuyns", "lojhv", "yzdpw", "vjigo", "wvqbs",
            "jivne", "yrpoh", "uqyrk", "dctqr", "zdgau", "hgqnz", "mihxp", "zxlhk", "dfqwm", "nmlwt",
            "gecqx", "usolr", "blyjp", "ztpir", "vafdh", "krfnt", "lqwzc", "gweji", "jpxtz", "mdhzk",
            "tcrli", "ofdmy", "qwyct", "fxwmd", "jevyb", "ocbpd", "aynve", "rfdzq", "skdim", "ctawz",
            "kbosv", "whlxz", "pmbiz", "rsagz", "afrln", "qxwdz", "pkmxq", "snvcw", "vdafo", "uyxsw",
            "lmijq", "ykcxa", "idauj", "lsdfp", "koemz", "dwmqo", "fshun", "zaiyr", "itpkf", "qkguc"
        ];
        $title = fake()->unique()->randomElement($wordList);
        return [
            'title' => ucfirst($title),
            'description' =>  fake()->text(),
            'slug' => Str::slug($title, '-'),
        ];
    }
}
