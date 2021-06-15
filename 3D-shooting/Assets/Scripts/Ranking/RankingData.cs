//名前とスコアの情報を保存するデータクラス
public class RankingData 
{
    public string Name { get; set; }
    public int Score { get; set; }

    public RankingData()
    {
        Name = "";
        Score = 0;
    }
}
